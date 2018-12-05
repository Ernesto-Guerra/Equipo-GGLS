<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{

    public function index()
    {
        return Question::where('status','Pendiente')->orderBy('created_at','desc')->get();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $question = new Question;
        $question->title=$request->title;
        $question->description=$request->description;
        $question->status='Pendiente';
        $question->subject=$request->subject;
        $question->user_id=$request->user_id;

        $question->save();
    }

    public function show($id)
    {
        return Question::find($id);
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
        $question = Question::find($id);
        $question->status = 'Contestado';
        $question->save();
        return $question;
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
    public function materia($materia){
        return Question::where('subject',$materia)->orderBy('created_at','desc')->get();
    }

}
