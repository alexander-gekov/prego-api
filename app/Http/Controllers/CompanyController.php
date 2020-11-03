<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Cors;
use Illuminate\Http\Request;
use App\Models\Company;
use Redirect;
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
        //Return IMAGE - successful
        // $logoImage=$company->logo_img;
        // $destinationPath = 'images/'.$logoImage;
        // return Response::file($destinationPath);

        return $company;

        //Try 2
        // return [
        //     'id'            => $company->id,
        //     'user_id'       => $company->user_id,
        //     'company_name'  => $company->company_name,
        //     'office_number' => $company->office_number,
        //     'owner_name'    => $company->owner_name,
        //     'logo_img'      => asset('images/' . $company->logo_img),
        // ];


        //Try
        // return response()->json([
        //     'company' => $company,
        //     'logo' => $this->getLogoImage($company)]);
    }

    public function store(Request $request)
    {
        // $company = Company::create($request->all());

        // $company = Company::create(['user_id' => $request->get('user_id'),
        // 'company_name' => $request->get('company_name'),
        // 'office_number' => $request->get('office_number'),
        // 'owner_name' => $request->get('owner_name'),
        // 'logo_img' => $request->get('logo_img'),
        // ]);



        // return response()->json($company, 201);



        //SUCCESSFUL
        // $request->validate([
        //     'user_id' => 'required',
        //     'company_name' => 'required',
        //     'office_number' => 'required',
        //     'owner_name' => 'required',
        //     'logo_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);

        // $company = new Company();
        // $company->user_id=$request->user_id;
        // $company->company_name=$request->company_name;
        // $company->office_number=$request->office_number;
        // $company->owner_name=$request->owner_name;

        // if ($file = $request->file('logo_img')) {
        // $destinationPath = 'images/';
        // $logoImage = $company->company_name . "_" . date('Ymd') . "." . $file->getClientOriginalExtension();
        // $file->move($destinationPath, $logoImage);
        // $company->logo_img=$logoImage;
        // }
        // else {
        //     $company->logo_img="no-logo.png";
        // }

        // return $company->save();


        //TRY - successful
        $company = new Company();
        $company->user_id=$request->user_id;
        $company->company_name=$request->company_name;
        $company->office_number=$request->office_number;
        $company->owner_name=$request->owner_name;
        $company->logo_img="no-logo.png";

        $company->save();
        return response()->json([
            'message' => 'success']);


        //USELESS
        // $insert['user_id'] = $request->get('user_id');
        // $insert['company_name'] = $request->get('company_name');
        // $insert['office_number'] = $request->get('office_number');
        // $insert['owner_name'] = $request->get('owner_name');
        // Company::insert($request->all());
        // return response()->json($company, 201);
    }

    public function update(Request $request, Company $company)
    {
        //SUCCESSFUL:
        // $company->user_id=$request->user_id;
        // $company->company_name=$request->company_name;
        // $company->office_number=$request->office_number;
        // $company->owner_name=$request->owner_name;

        // if ($file = $request->file('logo_img')) {
        // $destinationPath = 'images/';
        // $logoImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
        // $file->move($destinationPath, $logoImage);
        // $company->logo_img=$logoImage;
        // }
        // else {
        //     $company->logo_img="no-logo.png";
        // }

        // return $company->save();




        //TRY - Success:
//        if($request->has('user_id')){
//            $company->user_id=$request->user_id;
//        };
        $company->company_name=$request->company_name;
        $company->office_number=$request->office_number;
        // Picture upload:
        if($file = $request->file('image')){ 
            $destinationPath = 'images/';
            $logoImage = $company->id . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $logoImage);
            $company->logo_img=$logoImage;
        }

//        if($request->has('owner_name')){
//            $company->owner_name=$request->owner_name;
//        };
//        if($request->has('logo_img')){
//            $company->logo_img=$this->uploadLogoImage($request, $company);
//        };

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
        return response()->json(Company::where('user_id',$request->user_id)->get());
    }
}
