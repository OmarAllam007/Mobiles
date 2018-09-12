<?php

namespace App\Http\Controllers;

use App\Mobile;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    function getCompare()
    {
        $mobiles = Mobile::all()->each(function ($mobile) {
            $mobile['image'] = $mobile->image_path ?  asset('storage' . $mobile->image_path): asset('storage/no-phone.png');
        });
        return view('compare.compare', compact('mobiles'));
    }

    function analyzeCompareProcess()
    {
        $new_mobiles = [];
        $mobiles = Mobile::whereIn('id', \request('mobiles'))->get();
        return $mobiles;
        foreach ($mobiles as $key => $mobile) {
            $mobiles[$key] = $mobile;
            $mobiles[$key]['image'] = $mobile->image_path ?  asset('storage' . $mobile->image_path): asset('storage/no-phone.png');
            $mobiles[$key]['others_open_device'] = $this->getOpenBy($mobile);
            $mobiles[$key]['communication_network'] = $this->getNetwork($mobile);
        }
        return $mobiles;
    }

    function getOpenBy($mobile)
    {
        $openBy = [];
        if (count($mobile->others_open_device)) {
            foreach ($mobile->others_open_device as $key => $open) {
                $openBy[$key] = Mobile::$openBy[$open];
            }
        }
        return $openBy;

    }

    function getNetwork($mobile)
    {
        $network = [];
        if (count($mobile->communication_network)) {
            foreach ($mobile->communication_network as $key => $cn) {
                $network[$key] = Mobile::$network[$cn];
            }
        }
        return $network;
    }
}
