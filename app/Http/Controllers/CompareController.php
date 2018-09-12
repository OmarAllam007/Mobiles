<?php

namespace App\Http\Controllers;

use App\Mobile;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    function getCompare()
    {
        $mobiles = Mobile::all()->each(function ($mobile) {
            $mobile['image'] = asset('storage' . $mobile->image_path);
        });
        return view('compare.compare', compact('mobiles'));
    }

    function analyzeCompareProcess()
    {
        return Mobile::whereIn('id', \request('mobiles'))->get()->each(function ($mobile) {
            $mobile['image'] = asset('storage' . $mobile->image_path);
            $mobile['others_open_device'] = $this->getOpenBy($mobile);
            $mobile['communication_network'] = $this->getNetwork($mobile);
        });
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
