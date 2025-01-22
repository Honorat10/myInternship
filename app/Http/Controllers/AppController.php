<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(Request $request){
        return view('/dashboard',[
            'user' => $request->user(),
        ]);
    }
    public function new(){
        return view('/new');
    }
}
