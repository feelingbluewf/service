<?php 

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\CarServicesEmployee as Model;
use Carbon;

class CarServicesEmployeeRepository extends CoreRepository {

	public function __construct() {

		parent::__construct();

	}
	
	protected function getModelClass() {

		return Model::class;
		
	}

	// public function getByid($service_id) {
	// 	return $this->startConditions()
	// 	->where('service_id', $service_id)
	// 	->get();
	// }

	public function create($request, $service_id, $point_id) {
		$employees = [];

		foreach($request['name'] as $name) {
			$employees[] = [
				'service_id' => $service_id,
				'point_id' => $point_id,
				'name' => $name,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now()
			];
		}

		return $this->startConditions()
		->insert($employees);
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