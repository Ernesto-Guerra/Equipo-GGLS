<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Personalinformation;

class InformationController extends Controller
{
    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return Personalinformation::all();
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $info = new Personalinformation;
    
            $info->career='Test';
            $info->birthday='Test';
            $info->telephone=1234;
            $info->type='Test';
            $info->matricula=123;
    
            $info->save();
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            return Personalinformation::find($id);
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            
        }
    
        
        public function update(Request $request, $id)
        {
            $info = Personalinformation::find($id);
            $info->career = $request->career;
            $info->birthday = $request->birthday;
            $info->telephone = $request->telephone;
            $info->matricula = $request->matricula;

            
            $info->save();
        }
    
        public function destroy($id)
        {
            //
        }
}
    

