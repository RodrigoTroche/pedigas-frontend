<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function order()
    {
        return view('templates.order');
    }

    public function about()
    {
        return view('templates.about');
    }
}