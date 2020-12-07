<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function show(Employee $employee)
    {
        return $employee;
    }

    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->user_id=$request->user_id;
        $employee->company_id=$request->company_id;
        $employee->first_name=$request->first_name;
        $employee->last_name=$request->last_name;

        $employee->save();
        return response()->json([
            'message' => 'success']);
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->first_name=$request->first_name;
        $employee->last_name=$request->last_name;


        $employee->save();
        return response()->json([
            'message' => 'success']);
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'message' => 'success']);
    }

    public function getEmployeesByCompanyId(Request $request){
        $employees = Employee::where('company_id',$request->company_id)->get();
        foreach ($employees as $employee){
            $employee->label = $employee->first_name;
            $employee->value = $employee->id;
        }

        return $employees;
    }

    public function getEmployeeById(Request $request){
        $employee = Employee::where('id',$request->id)->get();

        return response()->json($employee);
    }

    public function getEmployees(Request $request){
        if($request->query()){
            $company_name = $request->query('company_name');
            if($request->query('company_id')){
                $employees = Employee::where('company_id',$request->query('company_id'))->get();
                foreach ($employees as $employee){
                    $employee->label = $employee->first_name;
                    $employee->value = $employee->id;
                }

                return $employees;
            }
            else{
                $company_id = Company::where('company_name',$company_name)->get();
                $employees = Employee::where('company_id',$company_id)->get();
                foreach ($employees as $employee){
                    $employee->label = $employee->first_name;
                    $employee->value = $employee->id;
                }

                return $employees;
            }
        }
        else {
            return response()->json([
                "message" => "Please specify query param."
            ]);
        }
    }
}
