<?php

namespace App\Http\Controllers;

use App\Models\FormAnswer;
use App\Models\Visitor;
use Illuminate\Http\Request;

class FormAnswerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $formanswer = new FormAnswer();
        $formanswer->company_id = $request->company_id;
        $data = json_encode($request->answers);
        $decoded = json_decode($data);
        $visitor = new Visitor();
        $visitor->first_name = $decoded->{'firstname'};
        $visitor->last_name = $decoded->{'lastname'};
        $visitor->email = $decoded->{'email'};
        $visitor->save();
        $formanswer->visitor_id = $visitor->id;
        $formanswer->answers = json_encode($request->answers);
        $formanswer->save();
        return response()->json([
            'message' => 'success'
        ]);

    }

    public function get(Request $request)
    {
        return FormAnswer::where('company_id', $request->company_id)->where('visitor_id', $request->visitor_id)->get();
    }

    public function getById(Request $request)
    {
        return FormAnswer::where('id', $request->id)->get();
    }

    /**
     * Get data.
     *
     * @param Request $request
     * @param string $company_name
     * @param string $param
     * @return String
     */
    public function getData(Request $request, $name, string $param = null)
    {

        $answers = FormAnswer::where('company_id', $request->company_id)->where('visitor_id', $request->visitor_id)->first();
        $data = json_decode($answers->answers);


        if ($param == '') {
            return $data->{'name'};
        }
        return $data->{$param};

    }

}
