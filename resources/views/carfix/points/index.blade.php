@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-weight: 600;">
                    <div class="row" style="align-items: center;">
                        <div class="col">
                            {{ __('Service Points') }}
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('carfix.points.create') }}"><button class="btn btn-success">Add</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @forelse($points as $point)
                    <div class="card mt-4 mb-4">
                        <div class="card-header" style="font-weight: 600; background-color: {{ $point->color }}">
                            <div class="float-left">
                                {{ $point->first()->details->name . ' - ' . $point->city}}
                            </div>
                            <div class="float-right">
                                <a href="{{ route('carfix.points.edit', $point->id) }}">
                                    <button class="btn btn-success">Edit</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <img src="{{ asset('pictures/service.jpg') }}" width="100%">
                                </div>
                                <div class="col-7">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td>Working hours:</td>
                                                <td>{{ $point->start_time . ' - ' . $point->end_time }}</td>
                                            </tr>
                                            <tr>
                                                <td>Employees:</td>
                                                <td>
                                                    @foreach($point->employees as $employee)
                                                    {{ $employee->name  }} <br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td>{{ $point->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Car brands:</td>
                                                <td>
                                                    @php
                                                    $cars = explode(',', $point->car_brands);
                                                    @endphp
                                                    @foreach($cars as $car)
                                                    {{ $car }} <br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Service provided:</td>
                                                <td>
                                                    @foreach($point->serviceType as $service_type)
                                                    {{ $service_type->service_type . ' ' . $service_type->price }}€ <br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Policy:</td>
                                                <td>
                                                    @if($point->policy == '0')
                                                    Own parts
                                                    @else
                                                    Carfix direct delivery from the Dealer
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h4>You have to add service points!</h4>
                    @endforelse
                </div>  
            </div>
        </div>
    </div>
</div>

@endsection
