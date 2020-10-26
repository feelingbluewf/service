<?php 

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Order as Model;
use Carbon;

class OrderRepository extends CoreRepository {

	public function __construct() {

		parent::__construct();

	}
	
	protected function getModelClass() {

		return Model::class;
		
	}

	public function getByNotSupportedServiceType(array $service_types, $order_ids) {
		$serviceTypesNotEquals = [];
		$orderIdsNotEquals = [];

		foreach ($service_types as $service_type) {
			$serviceTypesNotEquals[] = ['service_type', '!=', $service_type];
		}

		foreach ($order_ids as $order_id) {
			$orderIdsNotEquals[] = ['id', '!=', $order_id];
		}

		return $this->startConditions()
		->where($serviceTypesNotEquals)
		->where($orderIdsNotEquals)
		->where('timer', '>', Carbon\Carbon::now())
		->get();
	}

	public function create($request, $user_id) {

		$additional_info = $request['additional_info'] ? $request['additional_info'] : null;
		$service_type = $request['service_type'] == 'on' ? 'Diagnostics' : $request['service_type'];

		return $this->startConditions()
		->create([
			'user_id' => $user_id,
			'car_id' => $request['car'],
			'service_type' => $service_type,
			'additional_info' => $additional_info,
			'timer' => Carbon\Carbon::now()->addHours(1)
		]);
	}

	public function getAll($user_id) {
		return $this->startConditions()
		->where('user_id', $user_id)
		->get();
	}

}