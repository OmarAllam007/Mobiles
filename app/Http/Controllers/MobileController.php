<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Mobile;
use App\MobileImages;
use App\User;
use App\UserLike;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MobileController extends Controller
{
    function index()
    {
        $mobiles = Mobile::all();
        return view('mobile.index', compact('mobiles'));
    }

    function create()
    {
        return view('mobile.create');
    }

    function edit(Mobile $mobile)
    {
        return view('mobile.edit', compact('mobile'));
    }

    function store(Request $request)
    {
        $this->handleCheckBoxExist($request);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $attachment = Mobile::uploadImage($request->image);
            $data['image_path'] = $attachment->path ?? '';
        }


        $mobile = Mobile::create($data);

        if ($request->has('images')) {
            foreach ($request->images as $image) {
                $img_path = MobileImages::uploadImage($image, $mobile->id);
                MobileImages::create([
                    'mobile_id' => $mobile->id,
                    'image_path' => $img_path->path
                ]);
            }
        }
        return redirect()->route('mobile.index');
    }

    function update(Mobile $mobile, Request $request)
    {
        $this->handleCheckBoxExist($request);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $attachment = Mobile::uploadImage($request->image);
            $data['image_path'] = $attachment->path;
        }


        $mobile->update($data);

        if ($request->has('images')) {
            foreach ($request->images as $image) {
                $img_path = MobileImages::uploadImage($image, $mobile->id);
                MobileImages::create([
                    'mobile_id' => $mobile->id,
                    'image_path' => $img_path->path
                ]);
            }
        }
        return redirect()->route('mobile.index');
    }

    function destroy(Mobile $mobile)
    {
        $mobile->delete();
        return redirect()->route('mobile.index');
    }

    function show(Mobile $mobile, $mobile_brand, $mobile_name)
    {
        $hits = $mobile->number_of_hits ?? 0;
        $mobile->update([
            'number_of_hits' => $hits + 1,
        ]);
        return view('mobile.show', compact('mobile'));
    }

    function getMobileWithPrice()
    {
        $brands = Brand::with('mobiles')->get()->each(function ($brand) {
            return $brand->mobiles->each(function ($mobile) {
                $mobile['show_url'] = $mobile->show_url;
                $mobile['image_path'] = asset('storage' . $mobile->image_path);
            });
        });
//        $mobiles = \App\Mobile::all()->each(function ($mobile) {
//            $mobile['show_url'] = route('mobile.display', [$mobile, strtolower($mobile->brand->name), str_slug($mobile->name)]);
//            $mobile['main_price_description'] = $mobile['main_price_description'];
//            $mobile['brand_name'] = $mobile->brand->name;
//        })->groupBy('brand_name')->toArray();

        return view('mobile-prices.mobile-prices', compact('brands'));
    }

    function handleCheckBoxExist($request)
    {
        $request['others_vr_support'] = $request->others_vr_support ? 1 : 0;
        $request['others_additional_microphone_exist'] = $request->others_additional_microphone_exist ? 1 : 0;
        $request['media_radio_exist'] = $request->media_radio_exist ? 1 : 0;
        $request['media_is_35_mm_slot'] = $request->media_is_35_mm_slot ? 1 : 0;
        $request['communication_hotspot'] = $request->communication_hotspot ? 1 : 0;
        $request['communication_nfc'] = $request->communication_nfc ? 1 : 0;
        $request['communication_otg'] = $request->communication_otg ? 1 : 0;
        $request['communication_ir'] = $request->communication_ir ? 1 : 0;
        $request['battery_is_removable'] = $request->battery_is_removable ? 1 : 0;
        $request['others_notification_led_support'] = $request->others_notification_led_support ? 1 : 0;
        $request['is_online'] = $request->is_online ? 1 : 0;
        $request['available_in_egypt'] = $request->available_in_egypt ? 1 : 0;

        return $request;
    }

    public function makeFavourite(Request $request)
    {


        if (\Auth::check()) {
            $mobile = Mobile::find($request->get('mobile_id'));
            $mobile->users()->toggle($mobile->id);
            $count = DB::table('mobile_user')
                ->where('user_id', '=', Auth::id())
                ->where('mobile_id', '=', $mobile->id)
                ->count();

            return ['count' => $count];
        }
    }

    public function getFavourite(Request $request)
    {
        return Mobile::find(1)->users->count();
    }
}
