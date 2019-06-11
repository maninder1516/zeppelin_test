<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaUpload extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media_uploads';

}
