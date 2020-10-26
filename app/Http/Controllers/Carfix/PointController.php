<?php

namespace App\Http\Controllers\Carfix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CarServicesEmployeeRepository;
use App\Repositories\CarServicesPointRepository;
use App\Repositories\CarServicesServiceTypeRepository;
use Auth;

class PointController extends Controller
{

    private $carServicesEmployeeRepository;
    private $carServicesPointRepository;
    private $carServicesServiceTypeRepository;

    public function __construct(
        CarServicesEmployeeRepository $employee,
        CarServicesPointRepository $point,
        CarServicesServiceTypeRepository $serviceType
    ) {
        $this->carServicesEmployeeRepository = $employee;
        $this->carServicesPointRepository = $point;
        $this->carServicesServiceTypeRepository = $serviceType;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carfix.points.index', [
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
        return view('carfix.points.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $point = $this->carServicesPointRepository->create($request, Auth::user()->id);
        $this->carServicesEmployeeRepository->create($request, Auth::user()->id, $point->id);
        $this->carServicesServiceTypeRepository->create($request, Auth::user()->id, $point->id);
        return redirect()->back()->withSuccess('Service point successfully added!');
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
        return view('carfix.points.edit', [
            'point' => $this->carServicesPointRepository->getById($id)
        ]);
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
