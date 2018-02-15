<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Employee;
 
class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }
 
    public function show($id)
    {
        return Employee::find($id);
    }

    public function store(Request $request)
    {
        return Employee::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return $employee;
    }

    public function destroy(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return 204;
    }
}