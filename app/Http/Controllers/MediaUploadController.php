<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Log;
use App\Messages;
use App\MediaUpload;
use App\UploadedMedia;
use App\MediaResolution;
use Image;

class MediaUploadController extends Controller
{
    /**
     * Show the media upload page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            // Using Helper Functions
            if (function_exists('getMediaResolutions')) {
                $mediaResolutions = getMediaResolutions();
            }
            // Get the latest uploaded media
            $mediaUpload = MediaUpload::latest()->first();
            if($mediaUpload != null) {
                $mediaUpload->load('uploadedmedias');
            }
           
            // Pass all the parameters to its view
            return view('upload', ['mediaResolutions' => $mediaResolutions, 'mediaUpload' => $mediaUpload]);
        } catch (Exception $ex) {
            // Log the error
            Log::error("Method: " . __METHOD__ . ", Line " . __LINE__ . ": " . (string)$ex);
            return redirect()->route('/');
        }
    }

    /**
     * Create and save media with different required resolutions.
     */
    public function mediaUpload(Request $request)
    {
        try {
            // Build validation object
            $validation = MediaUpload::validate(Input::all());
            if ($validation->fails()) {
                return redirect('/')
                    ->with('errors', $validation->errors());
            } else {
                // Get the media resolutions
                $resolutionIds = $request->input('resolution_id');
                // Get the origional image
                $originalImage = $request->file('media_name');
                $imgOrigName = $originalImage->getClientOriginalName();
                $image = Image::make($originalImage);

                if ($this->isDuplicate($imgOrigName)) {
                    // Transaction-code
                    // DB::beginTransaction();
                    // Now save the record to our database
                    $mediaUpload = new MediaUpload;
                    if ($mediaUpload->saveMediaUpload($originalImage)) {
                        // Deliver the images in required resolutions
                        foreach ($resolutionIds as $resId) {
                            $mediaResolution = MediaResolution::find($resId);
                            $imagePath = public_path() . '/uploads/' . $mediaResolution->resolution;
                            $imgWidth = $mediaResolution->width;
                            $imgHeight = $mediaResolution->height;

                            // Resize image to required resolution
                            $image->resize($imgWidth, $imgHeight);
                            // Save the required image
                            $image->save($imagePath . time() . $imgOrigName);

                            $uploadedMedia =  new UploadedMedia;
                            $uploadedMedia->media_upload_id = $mediaUpload->id;
                            $uploadedMedia->name = $mediaResolution->resolution.time().$imgOrigName;
                            $uploadedMedia->path = $imagePath;
                            $uploadedMedia->width = $imgWidth;
                            $uploadedMedia->height = $imgHeight;
                            $uploadedMedia->active = 1;
                            $uploadedMedia->save();
                        }

                        // DB::commit();
                        Log::info('Media upload details saved successfully.');
                        $request->session()->flash('message.level', 'success');
                        $request->session()->flash('message.content', Messages::MEDIA_SAVE_SUCCESS);
                        
                        return redirect()->back()->withInput();
                    } else {
                        Log::error('Error while saving the upload media details.');
                        $request->session()->flash('message.level', 'danger');
                        $request->session()->flash('message.content', Messages::MEDIA_SAVE_ERROR);
                        
                        return redirect()->back()->withInput();
                    }
                } else {
                    Log::error('Duplicate image name found.');
                    $request->session()->flash('message.level', 'danger');
                    $request->session()->flash('message.content', Messages::MEDIA_NAME_DUPLICATED);
                    
                    return redirect()->back()->withInput();
                }
            }
        } catch (Exception $ex) {
            // DB::rollback();
            // Log the error
            Log::error("Method: " . __METHOD__ . ", Line " . __LINE__ . ": " . (string)$ex);
            return redirect()->route('/');
        }
    }

    // Check for duplicate file name
    protected function isDuplicate($imgOrigName) {
        $media = MediaUpload::where('media_name', $imgOrigName)->first();

        if($media == null){
            return true;
        }
        return false;
    }
}
