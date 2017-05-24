<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

class HomeController extends BackendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/home');
    }
}
