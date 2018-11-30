<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AllsController extends Controller
{
    public function users(){
        return User::all();
    }

    public function findUsers($id){
        return User::find($id);
    }
}
