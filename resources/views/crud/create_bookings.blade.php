@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Booking</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('bookings.store') }}">
                @csrf
                <div class="form-group">
                    <label for="customer_id">Customer ID</label>
                    <input type="text" name="customer_id"
                           value="{{ old('customer_id') }}" class="form-control" id="customer_id">
                </div>
                <div class="form-group">
                    <label for="payment_id">Payment ID</label>
                    <input type="text" name="payment_id"
                           value="{{ old('payment_id') }}" class="form-control" id="payment_id">
                </div>
                <div class="form-group">
                    <label for="booking_total">Booking Total</label>
                    <input type="text" name="booking_total"
                           value="{{ old('booking_total') }}" class="form-control" id="booking_total">
                </div>
                <div class="form-group">
                    <label for="booking_status">Status</label>
                    <input type="text" name="booking_status"
                           value="{{ old('booking_status') }}" class="form-control" id="booking_status">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
