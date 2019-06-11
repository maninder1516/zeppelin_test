<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileExtension extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'file_extensions';

    
}
