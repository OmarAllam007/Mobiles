<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    function getImages()
    {
        return Gallery::all();
    }

    function upload(Request $request){
        return $request->all();
    }
}
