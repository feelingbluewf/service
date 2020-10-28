@extends('layouts.app')

@section('content')

<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/select2.min.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-weight: 600;">{{ __('Adding service point') }}</div>
                <form action="{{ route('carfix.points.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group has-feedback">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{ old('city') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="{{ old('address') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="post_code">Post code</label>
                            <input type="text" name="post_code" class="form-control" id="post_code" placeholder="Post code" value="{{ old('post_code') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">Name and surname of employee</label>
                            <input type="text" name="name[]" class="form-control" id="name" placeholder="Name and Surname" value="{{ old('name') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <i class="fas fa-plus-circle float-right" id="add_employee" style="font-size: 22px; cursor: pointer; position: relative; top: -10px"></i>
                        <div class="form-group has-feedback">
                            <label for="car_brands">Car brands</label>
                            <select class="js-example-basic-multiple js-states form-control" id="car_brands" name="car_brands[]" multiple="multiple" required>
                                <option>Audi</option>
                                <option>BMW</option>
                                <option>Buick</option>
                                <option>Cadillac</option>
                                <option>Chevrolet</option>
                                <option>Chrysler</option>
                                <option>Dodge</option>
                                <option>Ferrari</option>
                                <option>Ford</option>
                                <option>GM</option>
                                <option>GEM</option>
                                <option>GMC</option>
                                <option>Honda</option>
                                <option>Hummer</option>
                                <option>Hyundai</option>
                                <option>Infiniti</option>
                                <option>Isuzu</option>
                                <option>Jaguar</option>
                                <option>Jeep</option>
                                <option>Kia</option>
                                <option>Lamborghini</option>
                                <option>Land Rover</option>
                                <option>Lexus</option>
                                <option>Lincoln</option>
                                <option>Lotus</option>
                                <option>Mazda</option>
                                <option>Mercedes</option>-Benz
                                <option>Mercury</option>
                                <option>Mitsubishi</option>
                                <option>Nissan</option>
                                <option>Oldsmobile</option>
                                <option>Peugeot</option>
                                <option>Pontiac</option>
                                <option>Porsche</option>
                                <option>Regal</option>
                                <option>Saab</option>
                                <option>Saturn</option>
                                <option>Subaru</option>
                                <option>Suzuki</option>
                                <option>Toyota</option>
                                <option>Volkswagen</option>
                                <option>Volvo</option>
                            </select>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div id="services">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group has-feedback">
                                        <label for="service_type">Service type</label>
                                        <select name="service_type[]" class="form-control" id="service_type" placeholder="Service type" required>
                                            <option value="" disabled selected hidden>Choose service type</option>
                                            <option value="Regular maintenance">Regular maintenance</option>
                                            <option value="Lights">Lights</option>
                                            <option value="Tyres">Tyres</option>
                                            <option value="Suspension">Suspension</option>
                                            <option value="Brakes">Brakes</option>
                                            <option value="Steering">Steering</option>
                                            <option value="Body">Body</option>
                                        </select>
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group has-feedback">
                                        <label for="price">Price</label>
                                        <input type="text" name="price[]" class="form-control" id="price" placeholder="Price" value="{{ old('price') }}" required>
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group has-feedback">
                                        <label for="time_required">Time required (days)</label>
                                        <input type="text" name="time_required[]" class="form-control" id="time_required" placeholder="Time required (days)" value="{{ old('time_required') }}" required>
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <i class="fas fa-plus-circle" id="add_service" style="font-size: 22px; cursor: pointer; position: relative; top: -10px"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="start_time">Start time</label>
                            <input type="time" name="start_time" class="form-control" id="start_time" placeholder="Start time" value="{{ old('start_time') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="end_time">End time</label>
                            <input type="time" name="end_time" class="form-control" id="end_time" placeholder="End time" value="{{ old('end_time') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="color">Choose the color that this point will be displayed in the calendar</label>
                            <input type="color" name="color" class="form-control" id="color" value="{{ old('color') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            Own parts
                            <label class="switch">
                                <input type="checkbox" name='policy'>
                                <span class="slider round"></span>
                            </label>
                            Carfix direct delivery from the Dealer
                        </div>
                        <button type="submit" id="submitForm" class="btn btn-success" style="margin-bottom: 10px;">Add</button>
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
    var el = "<div class='row'><div class='col'><div class='form-group has-feedback'><label for='service_type'>Service type</label><select name='service_type[]' class='form-control' id='service_type' placeholder='Service type' required><option value='' disabled selected hidden>Choose service type</option><option value='Regular maintenance'>Regular maintenance</option><option value='Lights'>Lights</option><option value='Tyres'>Tyres</option><option value='Suspension'>Suspension</option><option value='Brakes'>Brakes</option><option value='Steering'>Steering</option><option value='Body'>Body</option></select><span class='glyphicon form-control-feedback'></span></div></div><div class='col'><div class='form-group has-feedback'><label for='price'>Price</label><input type='text' name='price[]' class='form-control' placeholder='Price' required><span class='glyphicon form-control-feedback'></span></div></div><div class='col'><div class='form-group has-feedback'><label for='time_required'>Time required (days)</label><input type='text' name='time_required[]' class='form-control' placeholder='Time required (days)' required><span class='glyphicon form-control-feedback'></span></div></div></div>";
    lastInput.append(el);
    console.log(lastInput);
});

</script>

@endsection

