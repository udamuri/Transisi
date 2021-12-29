<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$limit = (int) $request->get('per_page') > 0 ? (int) $request->get('per_page') : 5;
        $page = (int) $request->get('page') > 0 ? (int) $request->get('page') : 1;
        $queries = ['search', 'page'];
         
        $model = Employee::with(['company'])
				->applyFilters($request->only($queries))
                ->paginateData($limit)->appends(request()->query());

        return view('admin.employee.index')->with([
            'model' => $model,
            'search' => $request->get('search'),
            'i' =>  (( (int) request()->input('page', 1) - 1) * $page)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $companyData = Employee::getEmployee(old('company_id', 0));

        return view('admin.employee.create')->with([
			'companyData' => json_encode($companyData),
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
		Employee::createWebapp($request);

        return redirect()->route('admin.employees.index')->with('success', 'Success');
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
    public function edit(Employee $employee)
    {
		$companyData = Employee::getEmployee(old('company_id', $employee->company_id));

        return view('admin.employee.update')->with([
            'model' => $employee,
			'companyData' => json_encode($companyData),
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->updateWebapp($request);

		return redirect()->route('admin.employees.index')->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
    }
}
