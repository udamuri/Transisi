<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use PDF;

class CompanyPdfController extends Controller
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
			$limit = (int) $request->get('per_page') > 0 ? (int) $request->get('per_page') : 5;
			$page = (int) $request->get('page') > 0 ? (int) $request->get('page') : 1;
			$queries = ['search', 'page'];
			
			$model = Company::applyFilters($request->only($queries))
					->paginateData($limit)->appends(request()->query());

			
			$pdf = PDF::loadView('pdf.company', $model);
			return $pdf->stream();
			
        } catch (\Exception $ex) {
            return response()->json([], 200);
        }
    }
}
