<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentsMethodsController extends Controller
{
    public function index()
    {
        $payments = PaymentMethod::all();

        return response(['payments_methods' => $payments]);
    }
}