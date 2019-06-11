<?php

use Illuminate\Database\Seeder;

class FileExtensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_extensions')->insert([
            'name' => 'PNG',
            'description' => 'PNG image',
            'extension' => '.png',
            'active' => 1,
        ]);

        DB::table('file_extensions')->insert([
            'name' => 'JPG',
            'description' => 'JPG image',
            'extension' => '.jpg',
            'active' => 1,
        ]);

        DB::table('file_extensions')->insert([
            'name' => 'JPEG',
            'description' => 'JPEG image',
            'extension' => '.jpeg',
            'active' => 1,
        ]);

        DB::table('file_extensions')->insert([
            'name' => 'GIF',
            'description' => 'GIF image',
            'extension' => '.gif',
            'active' => 1,
        ]);

        DB::table('file_extensions')->insert([
            'name' => 'ICO',
            'description' => 'Icon file',
            'extension' => '.ico',
            'active' => 1,
        ]);
        
    }
}
