<?php

namespace App\Http\Controllers;

use App\MobileImages;
use Illuminate\Http\Request;

class MobileImagesController extends Controller
{
    function destroy(MobileImages $mobile_image)
    {
        $mobile_image->delete();
    }
}
