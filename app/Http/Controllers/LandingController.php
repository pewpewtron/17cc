<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function showPemrograman()
    {
    	return view('landing.prog');
    }

    public function showWeb()
    {
    	return view('landing.web');
    }

    public function showLcc()
    {
    	return view('landing.lcc');
    }

    public function showIdea()
    {
    	return view('landing.idea');
    }

    public function showPaa()
    {
    	return view('landing.paa');
    }
}
