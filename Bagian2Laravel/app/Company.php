<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'website',
        'logo',
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

	public function getLogoUrlAtAttribute()
    {
        return null;
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
		$query->where('companies.name', 'LIKE', '%'.$search.'%')
		->orWhere('companies.email', 'LIKE', '%'.$search.'%')
		->orWhere('companies.website', 'LIKE', '%'.$search.'%');
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

    public static function createWebapp($request) {
        $data = $request->validated();

        $mdl = self::create($data);

		if($mdl) {
			if($request->hasFile('logo'))
			{
				$file = $request->file('logo');
				$filename = md5($mdl->id . $mdl->name . time()) . '.' . $file->getClientOriginalExtension();
				$file->storeAs('company/', $filename);
				
				$mdl->logo = $filename;
				$mdl->save();
			}
		}

        return $mdl;
    }

    public function updateWebapp($request) {
        $data = $request->validated();

        if($mdl = $this->update($data)) {
			if($request->hasFile('logo'))
			{
				Storage::disk('company')->delete($this->logo);				
				$file = $request->file('logo');
				$filename = md5($this->id . $this->name . time()) . '.' . $file->getClientOriginalExtension();
				$file->storeAs('company', $filename);
				
				$this->logo = $filename;
				$this->save();
			}
		}

        return $mdl ?? [];
    }

	public function deleteWebapp() {

		Storage::disk('company')->delete("{$this->logo}");
        if($this->delete()) {
			return true;
		}

        return false;
    }
}
