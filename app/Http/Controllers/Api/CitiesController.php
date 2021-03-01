<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('name', 'ASC')->get();

        return response(['cities' => $cities]);
    }
}