<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function cars()
    {
        return view('pages.car');
    }

    public function about()
    {
        return view('pages.about');
    }
    public function gallerie()
    {
        return view('pages.gallerie');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
