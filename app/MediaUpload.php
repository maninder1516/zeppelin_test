<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
