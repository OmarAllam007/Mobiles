<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class Mobile extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'image_path', 'description', 'released_date', 'operating_system',
        'device_dimension', 'device_weight', 'device_m_o_m', 'device_number_of_sims',
        'device_size_of_sim', 'processor', 'chipset', 'graphical_processor', 'internal_storage',
        'ram', 'external_storage', 'screen_size', 'screen_size_percentage', 'screen_resolution',
        'screen_dimensions', 'screen_density_of_pixels', 'screen_technology', 'screen_colors',
        'screen_touch_features', 'screen_protection', 'screen_extra_features', 'camera_main_camera',
        'camera_flash', 'camera_lens_aperture', 'camera_focal_length', 'camera_sensor_size',
        'camera_other_features', 'camera_video', 'camera_front_camera', 'camera_front_camera_features',
        'battery_type', 'battery_calls_until', 'battery_music_until', 'battery_video_until',
        'battery_is_removable', 'communication_network', 'communication_bluetooth', 'communication_wifi',
        'communication_hotspot', 'communication_nfc', 'communication_usb', 'communication_otg',
        'communication_ir', 'media_radio_exist', 'media_speaker', 'media_is_35_mm_slot',
        'others_open_device', 'others_gps', 'others_sensors', 'others_vr_support',
        'others_notification_led_support', 'others_additional_microphone_exist', 'colors', 'price',
        'url_souq', 'url_jumia', 'url_amazon', 'available_in_egypt', 'brand_id', 'is_online', 'keywords',
        'main_camera_pixels_description', 'main_ram_description'
        , 'main_battery_description', 'main_price_description', 'cons', 'pros', 'number_of_hits',
        'advertisements', 'number_of_fans'
    ];

    static $openBy = [1 => 'Face ID', 2 => 'Finger Print'];
    static $network = [1 => '2G', 2 => '3G', 3 => '4G', 4 => '5G'];

    protected $casts = [
        'internal_storage' => 'array',
        'ram' => 'array',
        'communication_network' => 'array',
        'others_open_device' => 'array',
        'external_storage' => 'array',
        'advertisements' => 'array',
        'main_price_description'=>'integer'
    ];

    protected $appends = ['show_url','get_image'];

    static function uploadImage($attachment)
    {
        $filename = $attachment->getClientOriginalName();
        $folder = storage_path('app/public/mobile_images/');
        if (!is_dir($folder)) {
            mkdir($folder, 0775, true);
        }

        $path = $folder . $filename;
        if (is_file($path)) {
            $filename = uniqid() . '_' . $filename;
        }

        $attachment->move($folder, $filename);

        $attachment->path = '/mobile_images/' . $filename;

        return $attachment;
    }

    function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    function images()
    {
        return $this->hasMany(MobileImages::class, 'mobile_id');
    }

    function getNetworkNamesAttribute()
    {
        if ($this->communication_network) {
            $names = [];
            foreach ($this->communication_network as $key => $network) {
                $names[$key] = self::$network[$network];
            }

            return implode(' / ', $names);
        }

    }

    function getShowUrlAttribute()
    {
        return route('mobiles.display', [$this, strtolower($this->brand->name), str_slug($this->name)]);
    }

    function getGetImageAttribute()
    {
        return $this->image_path ? asset('storage' . $this->image_path) : asset('storage/no-phone.png');
    }

    function getOpenDeviceAttribute()
    {
        if ($this->others_open_device) {
            $names = [];
            foreach ($this->others_open_device as $key => $open) {
                $names[$key] = self::$openBy[$open];
            }

            return implode(' / ', $names);
        }
    }

    function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

    function comments()
    {
        return $this->hasMany(MobileComment::class, 'mobile_id');
    }


    function mobileURLAttribute()
    {
        return route('mobiles.display',[$this,strtolower($this->brand->name),str_slug($this->name)]);
    }

    function scopeTopFans($query){
        return $query->orderBy('number_of_fans','DESC')->take(10);
    }

    function scopeTopHits($query){
        return $query->orderBy('number_of_hits','DESC')->take(10);
    }

    function scopeLatestMobiles($query){
        return $query->orderBy('created_at','DESC')->take(10);
    }

    function scopeByPrice($query){
        return $query->orderBy(DB::raw('CAST(main_price_description AS SIGNED)'),'DESC')->take(10);
    }

}
