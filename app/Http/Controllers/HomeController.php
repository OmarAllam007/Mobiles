<?php

namespace App\Http\Controllers;

use App\Mobile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topMobilesLove = Mobile::orderBy('number_of_fans','DESC')->take(10)->get();
        $topMobilesHits = Mobile::orderBy('number_of_hits','DESC')->take(10)->get();

        return view('index',compact('topMobilesLove','topMobilesHits'));
    }
}
