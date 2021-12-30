<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'company_id',
    ];

    public $timestamps = true;

    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $appends = [
        'formattedCreatedAt',
        'formattedUpdatedAt',
    ];

	public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
	
	public function getFormattedCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d M Y H:i:s');
    }
    
    public function getFormattedUpdatedAtAttribute($value)
    {
        return Carbon::parse($this->updated_at)->format('d M Y H:i:s');
    }

    public function scopeWhereSearch($query, $search)
    {
		$query->whereHas('company', function ($query) use ($search) {
			$query->where('name', 'LIKE', '%'.$search.'%');
		})->orWhere('employees.name', 'LIKE', '%'.$search.'%')
		->orWhere('employees.email', 'LIKE', '%'.$search.'%');
    }
	
	public function scopeWhereCompanyId($query, $company_id)
    {
		$query->where('employees.company_id', $company_id);
    }
    
    public function scopeApplyFilters($query, array $filters)
    {
        $filters = collect($filters);
        if ($filters->get('search')) {
            $query->whereSearch($filters->get('search'));
        }
	
		if ($filters->get('company_id')) {
            $query->whereCompanyId($filters->get('company_id'));
        }
    }

    public function scopePaginateData($query, $limit)
    {
        if ($limit == 'all') {
            return $query->get();
        }

        return $query->paginate($limit);
    }

	public static function getEmployee($company_id) {
        $company = Company::find($company_id);
		$categoryData = [];
		if($company) {
			$categoryData[] = [
				'id' => $company->id,
				'text' => $company->name,
			];
		}

		return $categoryData;
    }

    public static function createWebapp($request) {
        $data = $request->validated();

        $mdl = self::create($data);

        return $mdl;
    }

    public function updateWebapp($request) {
        $data = $request->validated();

        $mdl = $this->update($data);

        return $mdl ?? [];
    }

	public static function excelImport($request) {
		try {
			$file = $request->file('file');
			$data_excell = Excel::toArray(new EmployeeImport, $file);
			$data = collect($data_excell[0]);
			$chunks = $data->chunk(10);
			foreach ($chunks as $chunk)
			{
				$arrayInsert = [];
				foreach($chunk as $row) {
					if(isset($row[0]) && isset($row[1]) && isset($row[2])) {
						$arrayInsert[] = [
							'company_id' => (int) $row[0] ,
							'name' => (string) $row[1],
							'email' => filter_var($row[2], FILTER_VALIDATE_EMAIL) ?? null, 
						];
					}
				}
				$error = 0;
				if(count($arrayInsert)) {
					try {
						\DB::table('employees')->insert($arrayInsert);
					} catch(\Exception $ex) {
						$error++;
						continue;
					}
				}
			}
			
			return $error > 0 ? false : true;
        } catch (\Exception $ex) {
            return false;
        }
	}
}
