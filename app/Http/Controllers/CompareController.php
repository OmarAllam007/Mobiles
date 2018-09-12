<?php

namespace App\Http\Controllers;

use App\Mobile;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    function getCompare()
    {
        $mobiles = Mobile::all()->each(function ($mobile) {
            $mobile['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
        });
        return view('compare.compare', compact('mobiles'));
    }

    function analyzeCompareProcess(Request $request)
    {
        $new_mobiles = [];
        return [$request->query('mobiles'),$request->get('mobiles')];
        return $request->get('mobiles');
        $mobiles = Mobile::whereIn('id', $request->get('mobiles'))->get();
        foreach ($mobiles as $key => $mobile) {
            $mobiles[$key] = $mobile;
            $mobiles[$key]['image'] = $mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png');
            $mobiles[$key]['others_open_device'] = $this->getOpenBy($mobile);
            $mobiles[$key]['communication_network'] = $this->getNetwork($mobile);
        }
        return $mobiles;
    }

    function getOpenBy($mobile)
    {

        if (count($mobile->others_open_device)) {
            $openBy = [];
            foreach ($mobile->others_open_device as $key => $open) {
                $openBy[$key] = Mobile::$openBy[$open];
            }
            return $openBy;
        }
        return '';
    }

    function getNetwork($mobile)
    {
        if (count($mobile->communication_network)) {
            $network = [];

            foreach ($mobile->communication_network as $key => $cn) {
                $network[$key] = Mobile::$network[$cn];
            }
            return $network;
        }

        return '';

    }
}
