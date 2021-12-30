<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrData = [
			[
				'name' => 'PT. SANGKARA',
				'email' => 'info@sangkara.dev',
				'website' => 'https://sangkara.dev',
				'logo' => 'images/logo.png',
			],
			[
				'name' => 'PT. MERAPI ABCDF',
				'email' => 'info@merapiabcdf.dev',
				'website' => 'https://merapiabcdf.dev',
				'logo' => 'images/logo.png',
			],
			[
				'name' => 'CV. SINGGALANG',
				'email' => 'info@singgalang.dev',
				'website' => 'https://singgalang.dev',
				'logo' => 'images/logo.png',
			],
		];

		Storage::deleteDirectory('company');
		
		foreach($arrData as $value) {
			if(isset($value['logo'])) {
				$fileName = md5($value['logo'] . rand() . time()) . '.png';
				$file = public_path($value['logo']);
				Storage::putFileAs('company', $file, $fileName);

				$value['logo'] = $fileName;
			}

			Company::create($value);
		}
    }
}
