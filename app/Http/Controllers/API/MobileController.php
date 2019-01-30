<?php

namespace App\Http\Controllers\API;

use App\Mobile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Float_;

class MobileController extends Controller
{

    function filterMobilesByPrice(Request $request)
    {

        if ($request->has('price') && $request->price != "" && is_numeric($request->price)) {
            $price = $request->price;
            $mobiles = Mobile::where('main_price_description', '>=', floatval($price))->count();

            if ($mobiles) {
                return Mobile::whereNotNull('main_price_description')
                    ->where('main_price_description', '>', 0)
                    ->where('released_date', '>', '2010-01-01')
                    ->get()
                    ->groupBy('brand.name')
                    ->map(function ($items) use ($request, $price) {
                        return $items['mobiles'] = $items
                            ->where('main_price_description', '<=', $price + 200)
                            ->where('main_price_description', '>=', $price)
                            ->sortByDesc('main_price_description')
                            ->take(8);
                    })->sortKeys()->toArray();

            }

        } else {
            return Mobile::all()
                ->where('main_price_description', '>', 0)
                ->where('released_date', '<>', '')
                ->where('released_date', '>', '2010-01-01')
                ->groupBy('brand.name')
                ->map(function ($items) {
                    return $items['mobiles'] = $items->sortByDesc('main_price_description')->take(8);
                })->sortKeys()->toArray();

        }


    }


    function compareMobiles(Request $request)
    {
        if ($request->has('name') && $request->name != "") {
            return Mobile::orderBy(\DB::raw('CAST(main_price_description AS SIGNED)'), 'DESC')->where('name', 'like', '%' . $request->name . '%')
//                ->where('main_price_description', '<>', 0)
                ->get()->take(100)
                ->each(function ($mobile) {
                    $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
                });
        } else {
            return Mobile::orderBy(\DB::raw('CAST(main_price_description AS SIGNED)'), 'DESC')->where('main_price_description', '<>', 0)
                ->get()->take(100)->each(function ($mobile) {
                    $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
                });
        }
    }

    function chooseForMe(Request $request)
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
            $q->where('main_ram_description', '>=', $request->ram)->where('main_ram_description', '<', 100);
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


        return $q->orderBy(\DB::raw('CAST(main_price_description AS SIGNED)'), 'DESC')
            ->where('main_price_description', '<>', 0)->get()->take(100)->each(function ($mobile) {
                $mobile['show_url'] = $mobile->show_url;
                $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
            });
    }


    function search(Request $request)
    {

        $mobs = DB::table('mobiles as mobile')
            ->join('brands as b', 'b.id', '=', 'mobile.brand_id')
            ->selectRaw("CONCAT(b.name,' ',mobile.name) AS name , mobile.id as id")
            ->whereRaw("CONCAT(LOWER(b.name),' ',LOWER(mobile.name)) like   LOWER('%$request->search%') ")
            ->pluck('id');

        $mobiles = Mobile::query()
            ->whereIn('id', $mobs);
//            ->orderByRaw(\DB::raw("FIELD('main_price_description',{$ids}) DESC"));

        if ($request->has('search')) {
            return $mobiles
                ->orderByRaw('main_price_description * 1 DESC')
                ->take(4)->get()
                ->each(function ($mobile) {
                    $mobile['show_url'] = $mobile->show_url;
                    $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
                    $mobile['fullname'] = $mobile->brand->name . ' ' . $mobile->name;
                });
        } else {
            return $mobiles->orderByDesc('number_of_hits')
                ->take(4)->get()
                ->each(function ($mobile) {
                    $mobile['show_url'] = $mobile->show_url;
                    $mobile['fullname'] = $mobile->brand->name . ' ' . $mobile->name;
                    $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
                });

        }

    }

    function visited(Request $request)

    {

        $tempStr = implode(',', $request->visited);


        /** @var Collection $mobs */
        $mobs = Mobile::whereIn('id', $request->visited)->get()->each(function ($mobile) {
            $mobile['show_url'] = $mobile->show_url;
            $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
        });


        $mobiles = DB::table('mobiles')
            ->whereIn('id', $request->visited)
            ->orderByRaw(DB::raw("FIELD(id, $tempStr)"))
            ->get()->each(function ($mobile) use ($mobs) {
                $mobile->show_url = $mobs->where('id', $mobile->id)->first()->show_url;
                $mobile->image = $mobs->where('id', $mobile->id)->first()->image;
            });
        return $mobiles;
    }
}
