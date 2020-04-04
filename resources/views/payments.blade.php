@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Payments</h1>
@stop
@section('content')
    <a href="{{ route('payments.create') }}" class="btn btn-success">Add</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">Payment ID</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Payment Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($payment as $payment)
            <tr>
                <th scope="row">{{ $payment->payment_id }}</th>
                <td>{{ $payment->payment_method }}</td>
                <td>{{ $payment->payment_status }}</td>
                <td class="table-buttons">
                    <a href="{{ route('payments.edit', $payment) }}" class="btn btn-primary">
                        <i class="fas fa-pencil-alt" ></i>
                    </a>
                    <form method="POST" action="{{ route('payments.destroy', $payment) }}">
                        @csrf
                        @method('DELETE')
                        <br/>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
