<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Mobile;
use App\MobileImages;
use Illuminate\Http\Request;

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
        $request['others_vr_support'] = $request->others_vr_support ? 1 : 0;
        $request['others_additional_microphone_exist'] = $request->others_additional_microphone_exist ? 1 : 0;
        $request['others_additional_microphone_exist'] = $request->others_additional_microphone_exist ? 1 : 0;
        $request['is_online'] = $request->is_online ? 1 : 0;
        $request['available_in_egypt'] = $request->available_in_egypt ? 1 : 0;

        if ($request->hasFile('image')) {
            $attachment = Mobile::uploadImage($request->image);
            $data['path'] = $attachment->path ?? '';
        }

        $data = $request->all();

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
        $request['others_vr_support'] = $request->others_vr_support ? 1 : 0;
        $request['others_additional_microphone_exist'] = $request->others_additional_microphone_exist ? 1 : 0;
        $request['others_additional_microphone_exist'] = $request->others_additional_microphone_exist ? 1 : 0;
        $request['is_online'] = $request->is_online ? 1 : 0;
        $request['available_in_egypt'] = $request->available_in_egypt ? 1 : 0;
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
            });
        });
//        $mobiles = \App\Mobile::all()->each(function ($mobile) {
//            $mobile['show_url'] = route('mobile.display', [$mobile, strtolower($mobile->brand->name), str_slug($mobile->name)]);
//            $mobile['main_price_description'] = $mobile['main_price_description'];
//            $mobile['brand_name'] = $mobile->brand->name;
//        })->groupBy('brand_name')->toArray();

        return view('mobile-prices.mobile-prices', compact('brands'));
    }
}
