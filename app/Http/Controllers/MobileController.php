<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Jobs\UploadMobilesJob;
use App\Mobile;
use App\MobileCrawler;
use App\MobileImages;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MobileController extends Controller
{
    function index()
    {
        $mobiles = Mobile::paginate(20);
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
        return redirect()->route('mobiles.index');
    }

    function update(Mobile $mobile, Request $request)
    {
        $this->handleCheckBoxExist($request);

        $data = $request->all();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($mobile->image_path);
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
        return redirect()->route('mobiles.index');
    }

    function destroy(Mobile $mobile)
    {
        $mobile->delete();
        return redirect()->route('mobiles.index');
    }

    function show(Mobile $mobile)
    {

        $hits = $mobile->number_of_hits ?? 0;
        $mobile->update([
            'number_of_hits' => $hits + 1,
        ]);

        return view('mobile.show', compact('mobile'));
    }

    function getMobileWithPrice(Request $request)
    {
        return view('mobile-prices.mobile-prices');
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

    public function getUploadCrawler()
    {
        return view('mobile-crawler.index');
    }

    public function postUploadCrawler(Request $request)
    {
        $this->validate($request, ['brand_id' => 'required', 'url' => 'required']);

        $crawler = new MobileCrawler();
        $crawler->getMobData($request->url, $request->brand_id);

        return redirect()->back();
    }

    public function makeFavourite(Request $request)
    {
        if (Auth::check()) {
            $mobile = Mobile::find($request->get('mobile_id'));
            $is_favourite = $mobile->users()->where('user_id', Auth::id())->count();

            if ($is_favourite) {
                $last_fans_count = $mobile->number_of_fans - 1;
            } else {
                $last_fans_count = $mobile->number_of_fans + 1;
            }

            $mobile->users()->toggle(Auth::id());

            $mobile->update([
                'number_of_fans' => $last_fans_count
            ]);

            return ['number_of_fans' => $mobile->number_of_fans, 'is_favourite' => $mobile->users()->where('user_id', Auth::id())->count()];
        }

    }

    public function getFavourite(Request $request)
    {
        return Mobile::find(10)->users()->count();
    }

    function getMobilesByBrand(Brand $brand)
    {
        return view('brand.mobiles', compact('brand'));
    }

    function allBrands()
    {
        return view('brand.all_brands');
    }


    function search(Request $request)
    {
        $mobiles = Mobile::where('name', 'like', '%' . \request('q') . '%')->paginate(20);
        return view('mobile.index', compact('mobiles'));
    }

    function getUploadData()
    {
        return view('mobile.upload.upload');
    }

    function uploadData(Request $request)
    {
        if ($request->hasFile('mobiles')) {
            $this->dispatch(new UploadMobilesJob($request));
        }
    }
}
