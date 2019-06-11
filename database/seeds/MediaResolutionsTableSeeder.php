<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaResolutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_resolutions')->insert([
            'type' => 'image',
            'resolution' => '640x480px',
            'width' => 640,
            'height' => 480,
            'active' => 1,
        ]);

        DB::table('media_resolutions')->insert([
            'type' => 'image',
            'resolution' => '1280x720px',
            'width' => 1280,
            'height' => 720,
            'active' => 1,
        ]);
        
    }
}
