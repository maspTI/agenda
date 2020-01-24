<?php

namespace App\Http\Controllers;

use App\Phone;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function delivery(Phone $phone)
    {
        return view('terms.delivery')->with([
            'phone' => $phone,
            'date' => Carbon::now()
        ]);
    }

    public function refund(Phone $phone)
    {
        return view('terms.refund')->with([
            'phone' => $phone,
            'users' => $phone->users,
            'date' => Carbon::now()
        ]);
    }
}
