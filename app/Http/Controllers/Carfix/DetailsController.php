<?php

namespace App\Http\Controllers\Carfix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CarServicesDetailRepository;
use Auth;

class DetailsController extends Controller
{

    private $carServicesDetailRepository;

    public function __construct(CarServicesDetailRepository $details) {
     $this->carServicesDetailRepository = $details;
 }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->carServicesDetailRepository->getById(Auth::user()->id);

        if($details) {
            return view('carfix.details.index', [
                'details' => $details
            ]);
        }
        else {
            return redirect(route('carfix.details.create'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details = $this->carServicesDetailRepository->getById(Auth::user()->id);

        if($details) {
            return redirect(route('carfix.details.index'));
        }
        else {
            return view('carfix.details.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->carServicesDetailRepository->create($request, Auth::user()->id)) {
            return redirect(route('carfix.details.index'))->withSuccess('Details about company successfully added!');
        }
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
        return view('carfix.details.edit', [
            'details' => $this->carServicesDetailRepository->getById($id)
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
        if($this->carServicesDetailRepository->update($request, $id)) {
            return redirect(route('carfix.details.index'))->withSuccess('Details about company successfully updated!');
        }
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
