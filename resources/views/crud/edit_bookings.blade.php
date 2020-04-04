@extends('adminlte::page')

@section('title', 'Edit Bookings')

@section('content_header')
    <h1>Edit Bookings</h1>
@stop

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Category Data
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <form method="post" action="{{ route('bookings.update', $booking->bookings_id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="customer_id">Customer ID:</label>
                    <input type="text" class="form-control" name="customer_id" value="{{ $booking->customer_id }}"/>
                </div>
                <div class="form-group">
                    <label for="payment_id">Payment ID:</label>
                    <input type="text" class="form-control" name="payment_id" value="{{ $booking->payment_id}}"/>
                </div>
                <div class="form-group">
                    <label for="booking_total">Booking Total :</label>
                    <input type="text" class="form-control" name="booking_total" value="{{ $booking->booking_total }}"/>
                </div>
                <div class="form-group">
                    <label for="booking_status">Status :</label>
                    <input type="text" class="form-control" name="booking_status" value="{{ $booking->booking_status }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
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
