<?php

namespace App\Http\Controllers;

use App\Mobile;
use Illuminate\Http\Request;

class ChooseForMeController extends Controller
{
    function chooseForMe()
    {
        return view('choose-for-me.index');
    }

    function filterApply(Request $request)
    {
        $q = Mobile::query();

        if ($request->brand_id) {
            $q->where('brand_id', $request->brand_id);
        }

        if ($request->main_camera_pixels_description) {
            $q->where('main_camera_pixels_description', '>=', $request->main_camera_pixels_description);
        }

        if ($request->camera_front_camera) {
            $q->where('camera_front_camera', '>=', $request->camera_front_camera);
        }

        if ($request->ram) {
            $q->where('main_ram_description', '>=', $request->ram);
        }

        if ($request->main_battery_description) {
            $q->where('main_battery_description', '>=', $request->main_battery_description);
        }

        if ($request->price_from && !$request->price_to) {
            $q->where('main_price_description', '>=', $request->price_from);
        }

        if ($request->price_to && !$request->price_from) {
            $q->where('main_price_description', '<=', $request->price_to);
        }

        if ($request->price_to && $request->price_from) {
            $q->where('main_price_description', '>=', $request->price_from)
                ->where('main_price_description', '<=', $request->price_to);
        }


        return $q->get()->each(function ($mobile) {
            $mobile['show_url'] = route('mobile.display', [$mobile, strtolower($mobile->brand->name), str_slug($mobile->name)]);
            $mobile['image_path'] = asset('storage' . $mobile->image_path ? $mobile->image_path :$mobile->brand->image_path);
        });

    }


}
