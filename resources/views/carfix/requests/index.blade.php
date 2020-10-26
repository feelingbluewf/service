@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-weight: 600;">
                    {{ __('Requests') }}
                </div>
                <div class="card-body">
                  @forelse($requests as $request)
                  <div id="accept{{ $request->id }}" class="modal" style="padding: 0;">
                    <div class="card-header" style="font-weight: 600; margin: 0;">
                        Today, {{ Carbon\Carbon::parse($request->timer)->isoFormat('h:m') }}
                    </div>
                    <div style="padding: 15px 30px;">
                        <form action="{{ route('carfix.requests.store') }}" method="POST">
                            @csrf
                            <div class="form-group has-feedback">
                                <label for="point">Point</label>
                                <select name="point" id="point" class="form-control" required>
                                    <option value="" selected disabled hidden>Choose point</option>
                                    @forelse($points as $point)
                                    <option value="{{ $point->id }}">{{ $point->city . ', ' . $point->address}}</option>
                                    @empty
                                    <option disabled>You do not have any points!</option>
                                    @endforelse
                                </select>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" placeholder="Price" name="price"  required>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="start">Start time</label>
                                <input type="datetime-local" class="form-control" placeholder="Choose start time" name="start" required>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="finish">Finish time</label>
                                <input type="datetime-local" class="form-control" placeholder="Choose finish time" name="finish" required>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="service">Service type</label>
                                <input type="text" class="form-control" value="{{ $request->service_type }}" name="service" disabled>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                            <input type="hidden" value="{{ $request->id }}" name="order_id" required>
                            <input type="hidden" value="{{ $request->service_type }}" name="service_type" required>
                            <button type="submit" id="submitForm" class="btn btn-success" style="margin-bottom: 10px;">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="row mb-4" style="border: 2px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem; align-items: center;">
                    <div style="width: 100%;">
                        <div class="card-header" style="font-weight: 600; width: 100%;">
                            <div class="row">
                                <div class="col">
                                    @php
                                    $now = Carbon\Carbon::now();
                                    $end_at = new Carbon\Carbon($request->timer);
                                    $remaining = $now->diffInSeconds($end_at);
                                    if($now > $end_at) {
                                        $remaining = 0;
                                    }
                                    @endphp
                                    Today, {{ Carbon\Carbon::parse($end_at)->isoFormat('h:m') }}
                                </div>
                                <div class="col text-right">
                                    <span style="color: red;">Offer</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-left" style="padding: 15px;">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td><strong>Service type:</strong></td>
                                        <td><strong>{{ $request->service_type }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Model:</td>
                                        <td>
                                            {{ $request->car->brand . ', ' . $request->car->model . ' ' . $request->car->year }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>VIN:</td>
                                        <td>{{ $request->car->VIN }}</td>
                                    </tr>
                                    <tr>
                                        <td>Additional information:</td>
                                        <td>{{ $request->additional_info ? $request->additional_info : 'No info' }}</td>
                                    </tr>
                                        {{-- <tr>
                                            <td><strong>Service point:</strong></td>
                                            <td>
                                                <strong>ABC service Tartu</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Start:</strong></td>
                                            <td>
                                                <strong>12:00 10.08.2020</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>To be finished:</strong></td>
                                            <td>
                                                <strong>15:00 10.08.2020</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Spare parts:</td>
                                            <td>
                                                Own
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td>Customer:</td>
                                            <td>
                                                {{ $request->user->name . ' +372' .  $request->user->phone }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    {{ gmdate('H:i', $remaining) }} remaining <i class="fas fa-clock" style="font-size: 28px; vertical-align: middle;"></i>
                                    <a href="#accept{{ $request->id }}" rel="modal:open" style="text-decoration: none;">
                                        <button type="button" class="btn btn-success">
                                            Accept
                                        </button>
                                    </a>
                                    <button class="btn btn-danger" disabled>Decline</button>
                                </div>            
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                    @forelse($waitingRequests as $waitingRequest)
                    <div class="row mb-4" style="border: 2px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem; align-items: center;">
                        <div style="width: 100%;">
                            <div class="card-header" style="font-weight: 600; width: 100%;">
                                <div class="row">
                                    <div class="col">
                                        @php
                                        $now = Carbon\Carbon::now();
                                        $end_at = new Carbon\Carbon($waitingRequest->order->timer);
                                        $remaining = $now->diffInSeconds($end_at);
                                        if($now > $end_at) {
                                            $remaining = 0;
                                        }
                                        @endphp
                                        Today, {{ Carbon\Carbon::parse($end_at)->isoFormat('h:m') }}
                                    </div>
                                    <div class="col text-right">
                                        @if($waitingRequest->is_submitted == 0)
                                        <span class="text-primary">Sent for consideration</span>
                                        @elseif($waitingRequest->is_submitted == 1)
                                        <span class="text-success">Accepted</span>
                                        @else
                                        <span class="text-danger">Rejected</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-left" style="padding: 15px;">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td><strong>Service type:</strong></td>
                                            <td><strong>{{ $waitingRequest->order->service_type }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Model:</td>
                                            <td>
                                                {{ $waitingRequest->order->car->brand . ', ' . $waitingRequest->order->car->model . ' ' . $waitingRequest->order->car->year }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>VIN:</td>
                                            <td>{{ $waitingRequest->order->car->VIN }}</td>
                                        </tr>
                                        <tr>
                                            <td>Additional information:</td>
                                            <td>{{ $waitingRequest->order->additional_info ? $waitingRequest->order->additional_info : 'No info' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Service point:</strong></td>
                                            <td>
                                                <strong>{{ $waitingRequest->point->city . ', ' . $waitingRequest->point->address }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Start:</strong></td>
                                            <td>
                                                <strong>{{ $waitingRequest->start }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>To be finished:</strong></td>
                                            <td>
                                                <strong>{{ $waitingRequest->finish }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Spare parts:</td>
                                            <td>
                                                @if($waitingRequest->point->policy == '0')
                                                <span>Own parts</span>
                                                @else
                                                <span>Carfix direct delivery from the Dealer</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Customer:</td>
                                            <td>
                                                {{ $waitingRequest->order->user->name . ' +372' .  $waitingRequest->order->user->phone }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row" style="align-items: center;">
                                    <div class="col text-left">
                                        @if($waitingRequest->is_submitted == 0)
                                        <span>Waiting for response </span>
                                        <img src="{{ asset('/pictures/waiting.gif') }}" alt="waiting" width="6%">
                                        @elseif($waitingRequest->is_submitted == 1)
                                        @if($waitingRequest->is_autoaccept == 1)
                                        <span class="text-success font-weight-bold">Accepted automatically {{ $waitingRequest->updated_at }} <i class="fas fa-check"></i></span>
                                        @else
                                        <span class="text-success font-weight-bold">Accepted by customer {{ $waitingRequest->updated_at }} <i class="fas fa-check"></i></span>
                                        @endif
                                        @else
                                        <span class="text-danger font-weight-bold">Rejected by customer {{ $waitingRequest->updated_at }} <i class="fas fa-times"></i></span>
                                        @endif
                                    </div>
                                    <div class="col text-right">
                                        @if($waitingRequest->is_submitted == 0)
                                        {{ gmdate('H:i', $remaining) }} remaining <i class="fas fa-clock" style="font-size: 28px; vertical-align: middle;"></i>
                                        <button class="btn btn-danger" disabled>Decline</button>
                                        @elseif($waitingRequest->is_submitted == 1)
                                        <a href="{{ route('carfix.calendar.index') }}">
                                            <span class="text-primary" style="font-size:16px;">Go to calendar <i class="fas fa-calendar-alt"></i></span>
                                        </a>
                                        @endif
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
