<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function saveForm(Request $request)
    {
        $form = new Form();

        $form->company_id = $request->company_id;
        $form->json_form = $request->json_form;
        $form->accent_color = $request->accent_color;
        $form->form_name = $request->form_name;

        $form->save();
        return response()->json([
            'message' => 'success']);
    }

    public function getForm($company_id)
    {
        return response()->json(
            Company::find($company_id)->form()
                ->with(['company' => function($query) {
                        $query->without('user')->select(['companies.id','img3'])
                            ->with(['employees' => function($query) {
                                $query->without('user')->orderBy('first_name', 'asc');
                            }]);
                }])->get()
        );
    }
}
