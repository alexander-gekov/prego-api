<?php

namespace App\Http\Controllers;

use App\Models\FormAnswer;
use Illuminate\Http\Request;

class FormAnswerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $formanswer = new FormAnswer();
        $formanswer->form_id=$request->form_id;
        $formanswer->visitor_id=$request->visitor_id;
        $formanswer->answers=json_decode($request->answers);
        $formanswer->save();
        return response()->json([
            'message' => 'success'
        ]);

    }

    public function get(Request $request) {
        //return Employee::where('company_id',$request->company_id)->get();
        return FormAnswer::where('form_id', $request->form_id)->where('visitor_id', $request->visitor_id)->get();
    }

    public function getById(Request $request) {
        return FormAnswer::where('id', $request->id)->get();
    }

}
