@extends('layouts.app')

@section('content')

<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/select2.min.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-weight: 600;">{{ __('Editing service point') }}</div>
                <form action="{{ route('carfix.points.edit', $point->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group has-feedback">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city"  value="{{ $point->city }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ $point->address }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="post_code">Post code</label>
                            <input type="text" name="post_code" class="form-control" id="post_code" value="{{ $point->post_code }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">Name and surname of employee</label>
                            @foreach($point->employees as $employee)
                            @if($loop->first)
                            <input type="text" name="name[]" class="form-control" value="{{ $employee->name }}" required>
                            @else
                            <input type="text" name="name[]" class="form-control mt-2" value="{{ $employee->name }}" required>
                            @endif
                            @endforeach
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <i class="fas fa-plus-circle float-right" id="add_employee" style="font-size: 22px; cursor: pointer; position: relative; top: -10px"></i>
                        <div class="form-group has-feedback">
                            <label for="car_brands">Car brands</label>
                            <select class="js-example-basic-multiple js-states form-control" id="car_brands" name="car_brands[]" multiple="multiple" required>
                                @php
                                $selected_cars = explode(',', $point->car_brands);
                                $cars = ['Audi', 'BMW', 'Buick', 'Cadillac', 'Chevrolet', 'Chrysler', 'Dodge', 'Ferrari', 'Ford', 'GM', 'GEM', 'GMC', 'Honda', 'Hummer', 'Hyundai', 'Infiniti', 'Isuzu', 'Jaguar', 'Jeep', 'Kia', 'Lamborghini', 'Land', 'Rover', 'Lexus', 'Lincoln', 'Lotus', 'Mazda', 'Mercedes-Benz', 'Mercury', 'Mitsubishi', 'Nissan', 'Oldsmobile', 'Peugeot', 'Pontiac', 'Porsche', 'Regal', 'Saab', 'Saturn', 'Subaru', 'Suzuki', 'Toyota', 'Volkswagen', 'Volvo'];
                                $cars = array_diff($cars, $selected_cars);
                                @endphp
                                @foreach($selected_cars as $selected_car)
                                <option selected>{{ $selected_car }}</option>
                                @endforeach
                                @foreach($cars as $car)
                                <option>{{ $car }}</option>
                                @endforeach
                            </select>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        @php
                        @endphp
                        <div id="services">
                            @foreach($point->serviceType as $service_type)
                            <div class="row">
                                <div class="col">
                                    <div class="form-group has-feedback">
                                        <label for="service_type">Service type</label>
                                        <input type="text" name="service_type[]" class="form-control" value="{{ $service_type->service_type }}" required>
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group has-feedback">
                                        <label for="price">Price</label>
                                        <input type="text" name="price[]" class="form-control" value="{{ $service_type->price }}" required>
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group has-feedback">
                                        <label for="time_required">Time required</label>
                                        <input type="text" name="time_required[]" class="form-control" value="{{ $service_type->required_time }}" required>
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="float-right">
                            <i class="fas fa-plus-circle" id="add_service" style="font-size: 22px; cursor: pointer; position: relative; top: -10px"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="start_time">Start time</label>
                            <input type="time" name="start_time" class="form-control" id="start_time" value="{{ $point->start_time }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="end_time">End time</label>
                            <input type="time" name="end_time" class="form-control" id="end_time" value="{{ $point->end_time }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            Own parts
                            <label class="switch">
                                @if($point->policy == '0')
                                <input type="checkbox" name='policy'>
                                @else
                                <input type="checkbox" name='policy' checked>
                                @endif
                                <span class="slider round"></span>
                            </label>
                            Carfix direct delivery from the Dealer
                        </div>
                        <button type="submit" id="submitForm" class="btn btn-success" style="margin-bottom: 10px;" disabled>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function matchCustom(params, data) {
    // If there are no search terms, return all of the data
    if ($.trim(params.term) === '') {
      return data;
  }

    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
      return null;
  }

  if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) > -1) {
      var modifiedData = $.extend({}, data, true);
      modifiedData.text += ' (найдено)';

      // You can return modified objects from here
      // This includes matching the `children` how you want in nested data sets
      return modifiedData;
  }


    // Return `null` if the term should not be displayed
    return null;
}

$("#car_brands").select2({
    placeholder: 'Choose car brands',
    matcher: matchCustom
});


$(document).on("click", "#add_employee" , function() {
    var lastInput = $('input[name="name[]"]:last');
    var el = "<input type='text' name='name[]' class='form-control mt-2' placeholder='Name and Surname'>";
    lastInput.parent().append(el);
});
$(document).on("click", "#add_service" , function() {
    var lastInput = $('#services');
    var el = "<div class='row'><div class='col'><div class='form-group has-feedback'><label for='service_type'>Service type</label><input type='text' name='service_type[]' class='form-control' placeholder='Service type' required><span class='glyphicon form-control-feedback'></span></div></div><div class='col'><div class='form-group has-feedback'><label for='price'>Price</label><input type='text' name='price[]' class='form-control' placeholder='Price' required><span class='glyphicon form-control-feedback'></span></div></div><div class='col'><div class='form-group has-feedback'><label for='time_required'>Time required</label><input type='text' name='time_required[]' class='form-control' placeholder='Time required' required><span class='glyphicon form-control-feedback'></span></div></div></div>";
    lastInput.append(el);
    console.log(lastInput);
});
</script>

@endsection

