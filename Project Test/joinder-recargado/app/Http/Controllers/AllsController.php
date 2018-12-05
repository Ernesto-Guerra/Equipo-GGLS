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

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
    }
}
