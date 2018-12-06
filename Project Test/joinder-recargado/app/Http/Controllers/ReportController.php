<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Report;
use App\Answer;

class ReportController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {



            $report=new Report;
            $report->answer_id=$request->answer_id;
            $report->user_id=$request->user_id;

            $report->save();

        $count = Report::Where('answer_id',$request->answer_id)->get()->count();

        if($count >='5'){
            $answer = Answer::find($request->answer_id);
            $answer->delete();
            return null;
        }else{
            return $report;
        }

    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
