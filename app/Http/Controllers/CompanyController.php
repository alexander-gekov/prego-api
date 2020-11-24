<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Cors;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Response;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('name')){
            return Company::where('company_name',$request->name)->get();
        }
        return Company::all();
    }

    public function show(Company $company)
    {
        return $company;

    }

    public function store(Request $request)
    {

        $company = new Company();
        $company->building_owner_id=$request->building_owner_id;
        $company->company_name=$request->company_name;
        $company->manager_id=$request->manager_id;
        $company->manager_name=$request->manager_name;
        $company->office_number=$request->office_number;
        $company->logo_img="no-logo.png";

        $company->save();
        return response()->json([
            'message' => 'success']);
    }

    public function update(Request $request, Company $company)
    {
        $company->company_name=$request->company_name;
        $company->office_number=$request->office_number;
        $company->history=$request->history;
        $company->description=$request->description;


        // Picture upload:
        if($file = $request->file('image')){
            $destinationPath = 'images/';
            $logoImage = $company->id . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $logoImage);
            $company->logo_img=$logoImage;
        }
        $company->save();
        return response()->json([
            'message' => 'success']);
    }


    public function delete(Company $company)
    {
        $company->delete();

        return response()->json([
            'message' => 'success']);
        // return response()->json(null, 204);
    }

    private function uploadLogoImage(Request $request, Company $company)
    {
        $logoImage = $company->logo_img;
        if ($file = $request->file('logo_img')) {
            $destinationPath = 'images/';
            $logoImage = $company->company_name . "_" . date('Ymd') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $logoImage);
        }
        return $logoImage;
    }

    public function getLogoImage(Company $company)
    {
        $destinationPath = 'images/'.$company->logo_img;
        return Response::file($destinationPath);
    }

    public function getCompaniesByUserId(Request $request){
        return response()->json(Company::where('building_owner_id',$request->user_id)->get());
    }

    public function getCompanyByManager(Request $request){
        return response()->json(Company::where('manager_id',$request->user_id)->get());
    }
}
