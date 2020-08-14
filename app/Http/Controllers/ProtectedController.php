<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtectedController extends Controller
{
    // ini auth gunanya untuk memfilter biar user lain tidak bisa masuk
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('protected');
    }
}
