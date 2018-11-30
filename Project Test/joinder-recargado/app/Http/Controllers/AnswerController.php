<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswerController extends Controller
{

    public function index()
    {
        
    }


    public function Qanswers($question_id){
        return Answer::where('question_id',$question_id)->orderBy('created_at','desc')->get();
    }

    public function store(Request $request)
    {
        $answer=new Answer;

        $answer->answer=$request->answer;
        $answer->question_id=$request->question_id;
        $answer->user_id=$request->user_id;

        $answer->save();

        return $answer;
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
