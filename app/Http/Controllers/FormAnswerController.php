<?php

namespace App\Http\Controllers;

use App\Models\FormAnswer;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

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
        $formanswer->company_id=$request->company_id;
        $formanswer->visitor_id=$request->visitor_id;
        $formanswer->answers=json_encode($request->answers);
        $formanswer->save();
        return response()->json([
            'message' => 'success'
        ]);

    }

    public function get(Request $request) {
        return FormAnswer::where('company_id', $request->company_id)->where('visitor_id', $request->visitor_id)->get();
    }

    public function getById(Request $request) {
        return FormAnswer::where('id', $request->id)->get();
    }

    public function getData(Request $request, String $param) {

        $answers = FormAnswer::where('company_id', $request->company_id)->where('visitor_id', $request->visitor_id)->first();
        $data = json_decode($answers->answers);

        //If does not work add ''
        $asd = 'name';
        if ($param == String_::class){
            $asd = $param;
        }
        return $data->{$asd};

    }
    public function getDateStart(Request $request) {

        $answers = FormAnswer::where('company_id', $request->company_id)->where('visitor_id', $request->visitor_id)->first();
        $data = json_decode($answers->answers);

        //If does not work add ''

        return $data->{'date-start'};

    }
    public function getIsLonger(Request $request) {

        $answers = FormAnswer::where('company_id', $request->company_id)->where('visitor_id', $request->visitor_id)->first();
        $data = json_decode($answers->answers);

        //If does not work add ''

        return $data->{'isLonger'};

    }
    public function getDateEnd(Request $request) {

        $answers = FormAnswer::where('company_id', $request->company_id)->where('visitor_id', $request->visitor_id)->first();
        $data = json_decode($answers->answers);

        //If does not work add ''

        return $data->{'date-end'};

    }

}
