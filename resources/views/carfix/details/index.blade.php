@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-weight: 600;">
                    <div class="row" style="align-items: center;">
                        <div class="col">
                            {{ __('Your company details') }}
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('carfix.details.edit', $details->service_id) }}"><button class="btn btn-success">Edit</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group has-feedback">
                        <label for="name">Name of the company</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name of the company" value="{{ $details->name }}" disabled>
                        <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="registration_number">Registration number</label>
                        <input type="text" name="registration_number" class="form-control" id="registration_number" placeholder="Registration number" value="{{ $details->registration_number }}" disabled>
                        <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="vat_number">VAT number</label>
                        <input type="text" name="vat_number" class="form-control" id="vat_number" placeholder="VAT number" value="{{ $details->vat_number }}" disabled>
                        <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="{{ $details->address }}" disabled>
                        <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="post_code">Post code</label>
                        <input type="text" name="post_code" class="form-control" id="post_code" placeholder="Post code" value="{{ $details->post_code }}" disabled>
                        <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="bank_account_number">Bank account number</label>
                        <input type="text" name="bank_account_number" class="form-control" id="bank_account_number" placeholder="Bank account number" value="{{ $details->bank_account_number }}" disabled>
                        <span class="glyphicon form-control-feedback"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
