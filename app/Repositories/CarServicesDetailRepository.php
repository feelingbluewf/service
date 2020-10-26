<?php 

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\CarServicesDetail as Model;

class CarServicesDetailRepository extends CoreRepository {

	public function __construct() {

		parent::__construct();

	}
	
	protected function getModelClass() {

		return Model::class;
		
	}

	public function getByid($service_id) {
		return $this->startConditions()
		->where('service_id', $service_id)
		->first();
	}

	public function create($request, $service_id) {
		return $this->startConditions()
		->create([
			'service_id' => $service_id,
			'name' => $request['name'],
			'registration_number' => $request['registration_number'],
			'vat_number' => $request['vat_number'],
			'address' => $request['address'],
			'post_code' => $request['post_code'],
			'bank_account_number' => $request['bank_account_number']
		]);
	}

	public function update($request, $service_id) {
		return $this->startConditions()
		->where('service_id', $service_id)
		->update([
			'name' => $request['name'],
			'registration_number' => $request['registration_number'],
			'vat_number' => $request['vat_number'],
			'address' => $request['address'],
			'post_code' => $request['post_code'],
			'bank_account_number' => $request['bank_account_number']
		]);
	}

}