<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileImages extends Model
{
    protected $fillable = ['mobile_id', 'image_path'];

    static function uploadImage($attachment, $mobile_id)
    {
        $filename = $attachment->getClientOriginalName();
        $folder = storage_path('app/public/mobiles/' . $mobile_id . '/');
        if (!is_dir($folder)) {
            mkdir($folder, 0775, true);
        }

        $path = $folder . $filename;
        if (is_file($path)) {
            $filename = uniqid() . '_' . $filename;
        }

        $attachment->move($folder, $filename);

        $attachment->path = '/mobiles/' . $mobile_id . '/' . $filename;

        return $attachment;
    }
}
