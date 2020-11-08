<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function SaveForm(Request $request)
    {


        $form = new Form();

        $form->json_form = $request->json_form;
        $form->accent_color = $request->accent_color;
        $form->form_name = $request->form_name;
        $company = Company::where('company_name', $request->company_name)->first();
        $form->company_id = $company->id;
        $form->save();
        return response()->json([
            'message' => 'success']);
    }

    public function GetForm($company_id)
    {
//        $form = Form::where('id',$company->id)->first();
//        return $form;
        return response()->json(Form::where('company_id', $company_id)->get());
    }
}
