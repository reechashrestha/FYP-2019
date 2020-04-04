@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Bookings</h1>
@stop
@section('content')
    <a href="{{ route('bookings.create') }}" class="btn btn-success">Add</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">Booking ID</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Payment ID</th>
            <th scope="col">Booking Total</th>
            <th scope="col">Booking Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($booking as $booking)
            <tr>
                <th scope="row">{{ $booking->bookings_id }}</th>
                <td>{{ $booking->customer_id }}</td>
                <td>{{ $booking->payment_id }}</td>
                <td>{{ $booking->booking_total }}</td>
                <td>{{ $booking->booking_status }}</td>
                <td class="table-buttons">
                    <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-primary">
                        <i class="fas fa-pencil-alt" ></i>
                    </a>
                    <form method="POST" action="{{ route('bookings.destroy', $booking) }}">
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
