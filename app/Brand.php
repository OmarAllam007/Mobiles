<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Brand extends Model
{
    protected $fillable = ['name', 'image_path'];

    static function uploadImage($attachment)
    {
        $filename = $attachment->getClientOriginalName();
        $folder = storage_path('app/public/brands_images/');
        if (!is_dir($folder)) {
            mkdir($folder, 0775, true);
        }

        $path = $folder . $filename;
        if (is_file($path)) {
            $filename = uniqid() . '_' . $filename;
        }

        $attachment->move($folder, $filename);

        $attachment->path = '/brands_images/' . $filename;

        return $attachment;
    }


    function mobiles(){
        return $this->hasMany(Mobile::class,'brand_id');
    }

    function scopeTopMobiles($q){
         return $this->mobiles()->tophits();
    }
}
