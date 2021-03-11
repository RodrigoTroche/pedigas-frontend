<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;


class AddressesController extends Controller
{
    public function index()
    {
        $auth = Auth::user();

        $addresses = Address::where('user_id', $auth->id)->get();

        return response(['addresses' => $addresses]);
    }
}