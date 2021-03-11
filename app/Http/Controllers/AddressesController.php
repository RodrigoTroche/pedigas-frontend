<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Address;
use App\Models\City;

class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        $addresses = Address::where('user_id', $auth->id)->get();

        return view('templates.account.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Address $address)
    {
        $cities = City::orderBy('name', 'ASC')->get()->pluck('name', 'id');
        return view('templates.account.addresses.form', compact('address', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $auth = Auth::user();

            $request->request->add(['user_id' => $auth->id]);

            $address = Address::create($request->only([
                'user_id',
                'city_id',
                'alias',
                'main_address',
                'main_number',
                'contact',
                'reference',
                'phone_number',
                'business_name',
                'ruc'
            ]));

            Session::flash('message', 'Bien! Tu dirección ha sido creada exitosamente.');
        } catch (\Exception $e) {
            return $e->getMessage();
            Session::flash('message', 'Ups! Ocurrio un error al procesar tu solicitud. Por favor, intente más tarde');
        }

        return redirect(route('addresses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::findOrFail($id);
        $cities = City::orderBy('name', 'ASC')->get()->pluck('name', 'id');
        return view('templates.account.addresses.form', compact('address', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $auth = Auth::user();
            $address = Address::findOrFail($id);

            if ($address->user_id != $auth->id) {
                return abort(404, 'Esta dirección no existe');
            }

            $address->fill($request->only([
                'city_id',
                'alias',
                'main_address',
                'main_number',
                'contact',
                'reference',
                'phone_number',
                'business_name',
                'ruc'
            ]));
            $address->save();

            Session::flash('message', 'Bien! Tu dirección ha sido actualizada exitosamente.');
        } catch (\Exception $e) {
            return $e->getMessage();
            Session::flash('message', 'Ups! Ocurrio un error al procesar tu solicitud. Por favor, intente más tarde');
        }

        return redirect(route('addresses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}