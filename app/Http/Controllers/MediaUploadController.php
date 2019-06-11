<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MediaUploadController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Using Helper Functions
        if(function_exists('getMediaResolutions')) {
            $mediaResolutions = getMediaResolutions();
        }
        // dd($mediaResolutions);
        return view('upload', ['mediaResolutions' => $mediaResolutions]);
    }
}
