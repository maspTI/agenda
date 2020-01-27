<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agenda.index');
    }

    public function fetch($filter)
    {
        $users = new User;
        return $users->search(json_decode($filter));
    }

    public function show(User $user)
    {
        return view('agenda.details')->with(['contact' => $user]);
    }
}
