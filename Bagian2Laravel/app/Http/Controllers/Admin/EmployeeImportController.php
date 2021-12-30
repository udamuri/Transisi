<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeImportRequest;
use App\Employee;

class EmployeeImportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EmployeeImportRequest $request)
    {
        try {
			if(Employee::excelImport($request)) {
				return redirect()->route('admin.employees.index')->with('success', 'Successfully import data');
			} else {
				return redirect()->route('admin.employees.index')->with('error', 'Failed to import data');
			}	
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 200);
        }
    }
}
