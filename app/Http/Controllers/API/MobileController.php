<?php

namespace App\Http\Controllers\API;

use App\Mobile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                    ->get()
                    ->groupBy('brand.name')
                    ->map(function ($items) use ($request, $price) {
                        return $items['mobiles'] = $items
                            ->where('main_price_description', '<=', $price + 200)
                            ->where('main_price_description', '>=', $price)
                            ->sortByDesc('main_price_description')
                            ->take(30);
                    })
                    ->toArray();
            }

        } else {
            return Mobile::all()
                ->where('main_price_description', '>', 0)
                ->groupBy('brand.name')
                ->map(function ($items) {
                    return $items['mobiles'] = $items->sortByDesc('main_price_description')->take(30);
                })->toArray();
        }


    }
}
