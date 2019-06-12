<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;

class MediaUpload extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media_uploads';

    // Validate the Media Upload
    public static function validate($data)
    {
        return \Validator::make($data, static::$rules, static::$messages);
    }

    // Rules for MediaUpload validation
    public static $rules = array(
        'media_name' => 'required|mimes:jpeg,png,jpg',
        'resolution_id' => 'required',
    );

    // Messages
    public static $messages = array(
        'media_name.required' => 'The media is required. ',
        'resolution_id.required' => 'The resolution selection is required.',
    );

    /**
     * Get the uploaded medias for the upload.
     */
    public function uploadedmedias()
    {
        return $this->hasMany('App\UploadedMedia');
    }

     // Save media upload information
    function saveMediaUpload($originalImage) {
        try {
            $imgOrigName = $originalImage->getClientOriginalName();

            $this->media_name = $imgOrigName; 
            $this->size = $originalImage->getSize(); // Get image size in Kbs
            $this->extension = $originalImage->getClientOriginalExtension(); // Get file Extension 
            $this->active = 1;
            if ($this->save()) {
                return true;
            }
    
            return false;
        } catch (Exception $ex) {
            // Log the error
            Log::error("Method: " . __METHOD__ . ", Line " . __LINE__ . ": " . (string)$ex);
            return redirect()->route('/');
        }
    }
}
