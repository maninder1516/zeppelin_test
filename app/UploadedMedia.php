<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadedMedia extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'uploaded_medias';

    /**
     * Get the media upload that owns the uploaded media.
     */
    public function mediaupload()
    {
        return $this->belongsTo('App\MediaUpload', 'media_upload_id');
    }
}
