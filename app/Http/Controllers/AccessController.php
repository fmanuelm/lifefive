<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Access;


class AccessController extends Controller
{

    public function index()
    {
        return view('room_911');
    }

    public function create_access(Request $request)
    {
        $request->validate([
            'id_emp' => 'required|numeric|exists:employees'
        ]);
        $employee = Employee::where('id_emp',$request['id_emp'])->first();
        $result = $employee->allow_access;
        $id_emp = $employee->id;

        //return $result;
        $new = Access::create([
            'emp_id' => $id_emp,
            'result' => $result
        ]);
        if ($result == 1)
        {
            return redirect()->route('authorization')->with('status', 'The Employee has entered successfully');
        }
        else
        {
            return redirect()->route('authorization')->with('error', "The Employee doesn't have access to enter");
        }
    }
}
