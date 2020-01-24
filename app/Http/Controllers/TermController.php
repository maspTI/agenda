<?php

namespace App\Http\Controllers;

use App\User;
use App\Phone;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function delivery(Phone $phone)
    {
        return view('terms.delivery')->with([
            'phone' => $phone,
            'date' => Carbon::now()
        ]);
    }

    public function refund(Phone $phone, Request $request)
    {
        return view('terms.refund')->with([
            'phone' => $phone,
            'user' => User::where('cod_usuario', decrypt(request('user')))->first(),
            'date' => Carbon::now()
        ]);
    }
}
