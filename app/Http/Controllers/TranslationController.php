<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TranslationController extends Controller
{

    function changeLanguage($language)
    {
        Session::forget('personalized-language-ar');
        Session::forget('personalized-language-en');
        if ($language == 1) {
            Session::put('personalized-language-ar', $language);
        } else {
            Session::put('personalized-language-en', $language);
        }
        return redirect()->back();
    }
}
