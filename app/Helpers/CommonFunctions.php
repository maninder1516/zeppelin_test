<?php

use App\FileExtension;
use App\MediaResolution;

/**
  * Common Functions helper.
  *
  * @param $time
  * @param $tz
  *
  * @return Carbon\Carbon
  */
  function carbon($time = null, $tz = null) {
    return new \Carbon\Carbon($time, $tz);
  }

  function carbonFormatted($time = null, $tz = null) {
    return carbon($time, $tz)->format('Y-m-d');
  }

  function getFileExtensions() {
    $fileExtensions = FileExtension::all();

    return $fileExtensions;
  }

  function getMediaResolutions() {
    // Get categories's list
    $mediaResolutions =  MediaResolution::pluck('resolution', 'id');

    return $mediaResolutions;
}
