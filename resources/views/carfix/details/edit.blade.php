@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-weight: 600;">{{ __('Your company details') }}</div>
                <form action="{{ route('carfix.details.update', $details->service_id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group has-feedback">
                            <label for="name">Name of the company</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name of the company" value="{{ $details->name }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="registration_number">Registration number</label>
                            <input type="text" name="registration_number" class="form-control" id="registration_number" placeholder="Registration number" value="{{ $details->registration_number }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="vat_number">VAT number</label>
                            <input type="text" name="vat_number" class="form-control" id="vat_number" placeholder="VAT number" value="{{ $details->vat_number }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="{{ $details->address }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="post_code">Post code</label>
                            <input type="text" name="post_code" class="form-control" id="post_code" placeholder="Post code" value="{{ $details->post_code }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="bank_account_number">Bank account number</label>
                            <input type="text" name="bank_account_number" class="form-control" id="bank_account_number" placeholder="Bank account number" value="{{ $details->bank_account_number }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        {{ method_field('PUT') }}
                        <button type="submit" id="submitForm" class="btn btn-success" style="margin-bottom: 10px;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
