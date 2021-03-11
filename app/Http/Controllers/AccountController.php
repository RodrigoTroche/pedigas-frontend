<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        return view('templates.account.index');
    }

    public function update(Request $request)
    {
        try {
            $auth = Auth::user();
            $user = User::findOrFail($auth->id);
            $user->fill([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'document_number' => $request->document_number,
                'business_name' => $request->business_name,
                'ruc' => $request->ruc
            ]);
            $user->save();

            Session::flash('message', 'Bien! Tus datos han sido actualizados.');
        } catch (\Exception $e) {
            Session::flash('message', 'Ups! Ocurrió un problema al procesar tu solicitud. Intente nuevamente más tarde.');
        }

        return redirect()->back();
    }
}