<?php

namespace App\Http\Controllers\Carfix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Repositories\OfferRepository;
use App\Repositories\CarServicesPointRepository;
use App\Repositories\CarServicesServiceTypeRepository;
use Auth;

class RequestController extends Controller
{
    private $orderRepository;
    private $carServicesPointRepository;
    private $carServicesServiceRepository;
    private $offerRepository;

    public function __construct(
        OrderRepository $order,
        OfferRepository $offer,
        CarServicesPointRepository $point,
        CarServicesServiceTypeRepository $service
    ) {
        $this->orderRepository = $order;
        $this->offerRepository = $offer;
        $this->carServicesPointRepository = $point;
        $this->carServicesServiceRepository = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_types = $this->carServicesServiceRepository->getServiceTypes(Auth::user()->id);
        $order_ids = $this->offerRepository->getOrderIds(Auth::user()->id);

        return view('carfix.requests.index', [
            'requests' => $this->orderRepository->getByNotSupportedServiceType($service_types, $order_ids),
            'waitingRequests' => $this->offerRepository->getAll(Auth::user()->id),
            'points' => $this->carServicesPointRepository->getAll(Auth::user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->offerRepository->create($request, Auth::user()->id);

        return redirect()->back()->withSuccess('Request successfully submitted, wait for response from customer!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
