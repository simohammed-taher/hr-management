@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Employees and Salaries</h1>
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
                <a href="{{ route('salaries.create') }}" class="btn btn-primary">Add Salary</a>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Salary Amount</th>
                            <th>Payment Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @foreach ($salaries->where('employee_id', $employee->id) as $salary)
                                <tr>
                                    <td></td>
                                    <td>{{ $salary->amount }}</td>
                                    <td>{{ $salary->payment_date }}</td>
                                    <td>
                                        <a href="{{ route('salaries.edit', $salary) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('salaries.destroy', $salary) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
