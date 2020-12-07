<?php

namespace App\Http\Controllers;

use App\Mail\DeleteAppointmentMail;
use App\Mail\NotifyMail;
use App\Models\Appointment;
use App\Models\Company;
use App\Models\Employee;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    protected $defaultParams = array(
        'appointments.id',
        'appointments.form_answers',
        'appointments.first_name',
        'appointments.last_name',
        'appointments.email',
        'appointments.phone_number',
        'appointments.address',
        'appointments.date_start',
        'appointments.date_end'
    );

   public function store(Request $request) {
       $appointment = new Appointment();

       $decoded = json_decode($request->answers); // Attempt to create a PHP object from a JSON object

       try{
           $date_start = new DateTime($decoded->{'date-start'});
           $date_end = new DateTime($decoded->{'date-end'});

           if ($date_start > $date_end) throw new Exception();
       }
       catch(Exception $e){
           return response()->json(['message' => 'unsuccessful'], 400);
       }

       $appointment->employee_id = $request->employee_id;
       $appointment->form_answers = $request->answers; // Save the parsed JSON form answers
       $appointment->first_name = $decoded->{'firstname'};
       $appointment->last_name = $decoded->{'lastname'};
       $appointment->email = $decoded->{'email'};
       if (property_exists($decoded, 'phonenumber'))
           $appointment->phone_number = $decoded->{'phonenumber'};
       if (property_exists($decoded, 'address'))
           $appointment->address = $decoded->{'address'};
       $appointment->date_start = $date_start;
       $appointment->date_end = $date_end;

       $appointment->save();

       return response()->json([
           'message' => 'success'
       ]);
   }

   // UNCHECKED
   public function getUnavailableTimeslots(Request $request) {
       try{
           if($request->query()){
               return response()->json(
                   $appointmentDurations = Appointment::whereDate('date_start','like', substr($request->query('date_start'),0,10))->where('employee_id',$request->query('employee_id'))
                       ->get(['date_start','date_end'])
               );
           }
          return response()->json(
              $appointmentDurations = Appointment::whereDate('date_start','like', substr($request->input('date-start'),0,10))->where('employee_id',$request->employee_id)
                  ->get(['date_start','date_end'])
          );
       }catch(Exception $e){
           return response()->json(['message' => 'unsuccessful'], 400);
       }
   }

   public function index(Request $request) {
       return response()->json(
           Appointment::orderBy('date_start','desc')
               ->get(empty($request->all()) ? $this->defaultParams : $request->all())
       );
   }

    public function findById(Request $request)
    {
        return response()->json(
            Appointment::find($request->id, empty($request->all()) ? $this->defaultParams : $request->all())
        );

//        return response()->json(
//            Appointment::where('id', $request->id)->get());
    }

    public function findByEmployeeId($employee_id) {
        return response()->json(
            Employee::find($employee_id)
                ->appointments()
                ->orderBy('date_start','desc')
                ->get($this->defaultParams)
        );
    }


    public function findByCompanyId(Request $request) // Gets the latest appointments for a company
    {
        return response()->json(
            Company::find($request->company_id)
                ->appointments()
                ->orderBy('date_start','desc')
                ->get(empty($request->all()) ? $this->defaultParams : $request->all())

        );
    }

    public function findByIdAndCompanyId(Request $request) // Gets the latest appointments for a company
    {
        return response()->json(
            Company::find($request->company_id)
                ->appointments()
                ->orderBy('date_start','desc')
                ->find($request->id, empty($request->all()) ? $this->defaultParams : $request->all())
        );
    }

    public function findByIdAndEmployeeId(Request $request) // Gets the latest appointments for a company
    {
        return response()->json(
            Employee::find($request->employee_id)
                ->appointments()
                ->orderBy('date_start','desc')
                ->find($request->id, empty($request->all()) ? $this->defaultParams : $request->all())
        );
    }

    public function delete(Request $request)
    {
        $appointment = Appointment::where('id', $request->id)->get();
        if (count($appointment) > 0) {
            $appointment = $appointment[0];
            $employee = Employee::where('id',$appointment->employee_id)->get()[0];
            Mail::to($appointment->email)->send(new DeleteAppointmentMail($appointment, $employee));
            Appointment::destroy($request->id);
            return response()->json([$employee, $appointment]);
        }
        else{
            return response('Appointment not found', 404);
        }
    }
}

