<?php

namespace App\Http\Controllers;

use App\MobileComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobileCommentController extends Controller
{
    function postComment(Request $request)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));

        $mobile = MobileComment::create([
            'name' => $request->name ?? '',
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'mobile_id'=>$request->mobile_id,
            'is_approved' => 0,
            'approved_by'=> 0,
            'ip_address' => $details->ip ?? '',
            'city'=>$details->city ?? '',
            'country'=>$details->country ?? '',
        ]);
        $mobile = $mobile->morphToJson();
        return $mobile;
    }
}
