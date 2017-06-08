<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    protected $limit = 5;

    public function __construct()
    {
        $this->middleware('auth');
    }
}
