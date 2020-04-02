@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Payment Data
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

            <form method="post" action="{{ route('payments.update', $payment->payment_id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="payment_method">Payment Method:</label>
                    <input type="text" class="form-control" name="payment_method" value="{{ $payment->payment_method }}"/>
                </div>
                <div class="form-group">
                    <label for="payment_status">Status :</label>
                    <input type="text" class="form-control" name="payment_status" value="{{ $payment->payment_status }}"/>
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
