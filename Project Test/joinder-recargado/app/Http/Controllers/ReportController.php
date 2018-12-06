<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Report;

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

        return $report;
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
