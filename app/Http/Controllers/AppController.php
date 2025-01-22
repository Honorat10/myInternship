<?php

namespace App\Http\Controllers;

use App\Http\Requests\TraineeRequest;
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
    public function save(TraineeRequest $request){
        if ($request->type_stage == "academique") {
            if ($request->ecole == "") {
                notify()->error("Renseignez l'ecole");
                return redirect()->back();
            }
        }
    }
}
