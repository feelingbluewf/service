<?php 

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\CarServicesServiceType as Model;
use Carbon;

class CarServicesServiceTypeRepository extends CoreRepository {

	public function __construct() {

		parent::__construct();

	}
	
	protected function getModelClass() {

		return Model::class;
		
	}

	public function getServiceTypes($service_id) {
		$service_types = $this->startConditions()
		->where('service_id', $service_id)
		->get();

		$service_types_arr = [];

		foreach ($service_types as $service_type) {
			$service_types_arr[] = $service_type->service_type;
		}

		return $service_types_arr;
	}

	// public function getByid($service_id) {
	// 	return $this->startConditions()
	// 	->where('service_id', $service_id)
	// 	->first();
	// }

	public function create($request, $service_id, $point_id) {

		$services = [];

		for ($i=0; $i < count($request['service_type']); $i++) {
			$services[] = [
				'service_id' => $service_id,
				'point_id' => $point_id,
				'service_type' => $request['service_type'][$i],
				'price' => $request['price'][$i],
				'required_time' => $request['time_required'][$i],
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now()
			];
		}

		return $this->startConditions()
		->insert($services);
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