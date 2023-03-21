<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $salaries = Salary::with('employee')->get();

        return view('employees-salaries.index', compact('employees', 'salaries'));
    }
}
