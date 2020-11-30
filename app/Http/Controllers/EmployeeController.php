<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

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
        return Employee::where('company_id',$request->company_id)->get();
    }

    public function getEmployeeByUserId(Request $request) {
        return response()->json(Employee::where('user_id',$request->user_id)->get());
    }
}
