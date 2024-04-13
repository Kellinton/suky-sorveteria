<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AtendenteController extends Controller
{
    public function index(){
        return view('dashboard.atendente.index');
    }
}
