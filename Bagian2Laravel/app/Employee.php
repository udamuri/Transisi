<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
    
    public function scopeApplyFilters($query, array $filters)
    {
        $filters = collect($filters);
        if ($filters->get('search')) {
            $query->whereSearch($filters->get('search'));
        }
    }

    public function scopePaginateData($query, $limit)
    {
        if ($limit == 'all') {
            return collect(['data' => $query->get()]);
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
}
