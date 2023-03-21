<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->get();

        return view('salary.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();

        return view('salary.create', compact('employees'));
    }

public function store(Request $request)
{
    $request->validate([
        'employee_id' => 'required|integer|exists:employees,id', // make sure the employee_id exists in the employees table
        'amount' => 'required|numeric',
        'payment_date' => 'required|date',
    ]);

    $data = [
        'employee_id' => $request->input('employee_id'),
        'amount' => $request->input('amount'),
        'payment_date' => $request->input('payment_date'),
    ];
    // print_r($data);
    $salary = Salary::create($data);

    return redirect()->route('salaries.index')->with('success', 'Salary added successfully.');
}

    public function edit(Salary $salary)
    {
        $employees = Employee::all();

        return view('salary.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'employee_id' => 'required',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        $salary->update($request->all());

        return redirect()->route('salaries.index')->with('success', 'Salary updated successfully.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->route('salaries.index')->with('success', 'Salary deleted successfully.');
    }
}
