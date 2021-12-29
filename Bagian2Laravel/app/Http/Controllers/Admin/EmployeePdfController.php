<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use PDF;

class EmployeePdfController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
			$limit = $request->has('per_page') ? ((int) $request->get('per_page') > 0 ?? 5) : "all";
			$page = (int) $request->get('page') > 0 ? (int) $request->get('page') : 1;
			$queries = ['search', 'page', 'company_id'];
			
			$query = Employee::with(['company'])
					->applyFilters($request->only($queries))
					->paginateData($limit);
			if($limit == "all" && $request->has('company_id')) {
				$model = $query->toArray();
			} else {
				$model = $query->toArray();
			}
			$pdf = PDF::loadView('pdf.employee', compact('model'));
			return $pdf->stream();
			
        } catch (\Exception $ex) {
            return response()->json([], 200);
        }
    }
}
