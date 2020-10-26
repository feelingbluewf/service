<?php 

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Offer as Model;
use Carbon;

class OfferRepository extends CoreRepository {

	public function __construct() {

		parent::__construct();

	}
	
	protected function getModelClass() {

		return Model::class;
		
	}

	// public function getByNotSupportedServiceType(array $service_types) {
	// 	$whereData = [];

	// 	foreach ($service_types as $service_type) {
	// 		$whereData[] = ['service_type', '!=', $service_type];
	// 	}

	// 	return $this->startConditions()
	// 	->where($whereData)
	// 	->where('timer', '>', Carbon\Carbon::now())
	// 	->get();
	// }

	public function create($request, $service_id) {

		return $this->startConditions()
		->create([
			'order_id' => $request['order_id'],
			'service_id' => $service_id,
			'point_id' => $request['point'],
			'service_type' => $request['service_type'],
			'price' => $request['price'],
			'start' => $request['start'],
			'finish' => $request['finish']
		]);
	}

	public function getOrderIds($service_id) {
		$offers = $this->startConditions()
		->where('service_id', $service_id)
		->get();

		$order_ids = [];

		foreach($offers as $offer) {
			$order_ids[] = $offer->order_id;
		}

		return $order_ids;
	}

	public function getAll($service_id) {
		return $this->startConditions()
		->where('service_id', $service_id)
		->get();
	}

	public function getAllSubmitted($service_id) {
		return $this->startConditions()
		->where('service_id', $service_id)
		->where('is_submitted', 1)
		->get();
	}

}