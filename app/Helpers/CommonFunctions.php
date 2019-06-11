<?php

use App\FileExtension;
use App\MediaResolution;

/**
 * Common Functions helper.
 *
 * @return array
 */
function getFileExtensions()
{
  $fileExtensions = FileExtension::all('extension')->toArray(); //all('extension');
  
  return $fileExtensions;
}

function getMediaResolutions()
{
  // Get categories's list
  $mediaResolutions =  MediaResolution::pluck('resolution', 'id');

  return $mediaResolutions;
}
