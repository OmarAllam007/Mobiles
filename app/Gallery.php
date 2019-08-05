<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Gallery extends Model
{
    protected $fillable = ['path'];


    static function uploadImage(UploadedFile $file)
    {
        $filename = $file->getClientOriginalName();
        $folder = storage_path('app/public/gallery/');
        if (!is_dir($folder)) {
            mkdir($folder, 0775, true);
        }

        $path = $folder . $filename;
        if (is_file($path)) {
            $filename = uniqid() . '_' . $filename;
        }

        $file->move($folder, $filename);

        $file->path = '/gallery/' . $filename;

        return $file;
    }
}
