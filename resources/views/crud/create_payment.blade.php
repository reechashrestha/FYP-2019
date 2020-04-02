@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Payment</h1>
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

            <form method="POST" action="{{ route('payments.store') }}">
                @csrf
                <div class="form-group">
                    <label for="payment-method">Payment Method</label>
                    <input type="text" name="payment_method"
                           value="{{ old('payment_method') }}" class="form-control" id="payment-method">
                </div>
                <div class="form-group">
                    <label for="payment-status">Status</label>
                    <input type="text" name="payment_status"
                           value="{{ old('payment_status') }}" class="form-control" id="payment.e-status">
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
