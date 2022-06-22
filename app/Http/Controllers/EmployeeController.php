<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Access;
use App\Models\Department;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees', ['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('create_employee', ['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'id_emp' => 'required | numeric',
            'firstname' => 'required | string',
            'lastname' => 'required | string',
            'department_id' => 'required',
        ]);

        $new = Employee::create([
            'id_emp' => $request['id_emp'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'department_id' => $request['department_id'],
            'allow_access' => $request['allow_access'],
        ]);

        return redirect('/employee/' . $new->id . '/edit')->with('status', 'The Employee has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = Department::all();
        return view('edit_employee', ['employee'=>$employee, 'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_emp' => 'required | numeric',
            'firstname' => 'required | string',
            'lastname' => 'required | string',
            'department_id' => 'required',
        ]);


        $update = Employee::where('id', $id)->update([
            'id_emp' => $request['id_emp'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'department_id' => $request['department_id'],
            'allow_access' => $request['allow_access'],
        ]);

        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_access = Access::where('emp_id', $id)->delete();
        $delete = Employee::find($id)->delete();
        return redirect('/employee');
    }

    public function change_access(Request $request)
    {
        $id = $request['id'];
        $emp = Employee::find($id);
        if ($emp)
        {
            if ($emp->allow_access == 0)
                $new_access = 1;
            else
                $new_access = 0;

            $delete = Employee::where('id', $id)->update([
                'allow_access' => $new_access
            ]);
        }

        return redirect('/employee');
    }
}
