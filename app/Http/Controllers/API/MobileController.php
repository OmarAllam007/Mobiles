<?php

namespace App\Http\Controllers\API;

use App\Mobile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                            ->take(5);
                    })->sortKeys()->toArray();

            }

        } else {
            return Mobile::all()
                ->where('main_price_description', '>', 0)
                ->where('released_date', '<>', '')
                ->where('released_date', '>', '2010-01-01')
                ->groupBy('brand.name')
                ->map(function ($items) {
                    return $items['mobiles'] = $items->sortByDesc('main_price_description')->take(5);
                })->sortKeys()->toArray();

        }


    }


    function compareMobiles(Request $request)
    {
        if ($request->has('name') && $request->name != "") {
            return Mobile::where('name', 'like', '%' . $request->name . '%')
//                ->where('main_price_description', '<>', 0)
                ->get()->take(100)
                ->each(function ($mobile) {
                    $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
                });
        } else {
            return Mobile::where('main_price_description', '<>', 0)
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
        $mobiles = Mobile::query()->where('main_price_description', '<>', 0)
            ->orderBy('main_price_description', 'DESC');

        if ($request->has('search')) {
            return $mobiles->where('name', 'like', '%' . $request->search . '%')
                ->take(4)->get()
                ->each(function ($mobile) {
                    $mobile['show_url'] = $mobile->show_url;
                    $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
                });
        } else {
            return $mobiles->orderByDesc('number_of_hits')
                ->take(4)->get()
                ->each(function ($mobile) {
                    $mobile['show_url'] = $mobile->show_url;
                    $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
                });

        }

    }

    function visited(Request $request)

    {
        $tempStr = implode(',', $request->visited);

        return DB::table('mobiles')
        ->whereIn('id', $request->visited)
        ->orderByRaw(DB::raw("FIELD(id, $tempStr)"))
        ->get();
    }
}
