<?php 

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\CarServicesPoint as Model;

class CarServicesPointRepository extends CoreRepository {

	public function __construct() {

		parent::__construct();

	}
	
	protected function getModelClass() {

		return Model::class;
		
	}


	public function getAll($service_id) {
		return $this->startConditions()
		->where('service_id', $service_id)
		->get();
	}

	public function create($request, $service_id) {
		$car_brands = '';

		foreach ($request['car_brands'] as $car_brand) {
			$car_brands .= $car_brand . ',';
		}

		$car_brands = substr($car_brands, 0, -1);

		$policy = 0;

		if(isset($request['policy'])) {
			$policy = 1;
		}

		return $this->startConditions()
		->create([
			'service_id' => $service_id,
			'city' => $request['city'],
			'address' => $request['address'],
			'post_code' => $request['post_code'],
			'car_brands' => $car_brands,
			'start_time' => $request['start_time'],
			'end_time' => $request['end_time'],
			'policy' => $policy,
			'bank_account_number' => $request['bank_account_number']
		]);
	}

	// public function update($request, $service_id) {
	// 	return $this->startConditions()
	// 	->where('service_id', $service_id)
	// 	->update([
	// 		'name' => $request['name'],
	// 		'registration_number' => $request['registration_number'],
	// 		'vat_number' => $request['vat_number'],
	// 		'address' => $request['address'],
	// 		'post_code' => $request['post_code'],
	// 		'bank_account_number' => $request['bank_account_number']
	// 	]);
	// }

}