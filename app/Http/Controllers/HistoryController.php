<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Access;
use App\Models\Employee;

class HistoryController extends Controller
{
    public function history($id)
    {
        $history = Access::where('emp_id', $id)->get();
        $emp = Employee::find($id);
        return view('history', ['history'=>$history, 'emp'=>$emp]);
    }
}
