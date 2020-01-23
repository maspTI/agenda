<?php

namespace App\Http\Controllers;

use App\User;
use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create')
            ->with([
                'menus' => auth()->user()->menus(),
                'users' => User::where('status', 1)->whereNotNull('email')->orderBy('nome')->get()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest();

        $phone = Phone::create([
            'brand' => request('marca'),
            'model' => request('modelo'),
            'phone_number_1' => request('telefone_1'),
            'phone_number_2' => request('telefone_2'),
            'imei_1' => request('imei_1'),
            'imei_2' => request('imei_2'),
            'quick_dial' => request('discagem_rapida'),
            'serial_number' => strtoupper(request('numero_serie')),
        ]);

        if (request('usuarios')) {
            $phone->attachUsers();
        }

        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        //
    }

    protected function validateRequest()
    {
        request()->validate([
            'marca' => 'max:250',
            'modelo' => 'max:250',
            'telefone_1' => 'max:250',
            'telefone_2' => 'nullable|max:250',
            'imei_1' => 'nullable|max:15|min:15',
            'imei_2' => 'nullable|max:15|min:15',
            'numero_serie' => 'max:250',
            'discagem_rapida' => 'nullable|max:4|min:4',
        ]);
    }
}
