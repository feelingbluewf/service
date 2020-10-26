<?php

namespace App\Transformers;

final class CalendarTransformer {

	static public function getJson($models) {
		$data = '[';

		foreach($models as $model) {
			$data .= '{ "start": "' . $model->start . '", "end": "' . $model->finish . '", "title": "' . $model->service_type . ' change ' . $model->order->car->brand . ' ' . $model->order->car->model . ' ' . $model->order->car->year . '" },'; 
		}

		$data .= ']';

		return $data;
	}

}