@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Edit Service Data</h1>
@stop

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
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

            <form method="post" action="{{ route('services.update', $service->service_id ) }}" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="category_id">Category ID:</label>
                    <input type="text" class="form-control" name="category_id" value="{{ $service->category_id }}"/>
                </div>
                <div class="form-group">
                    <label for="service_name">Name:</label>
                    <input type="text" class="form-control" name="service_name" value="{{ $service->service_name }}"/>
                </div>
                <div class="form-group">
                    <label for="service_desc">Description:</label>
                    <input type="text" class="form-control" name="service_desc" value="{{ $service->service_desc }}"/>
                </div>
                <div class="form-group">
                    <label for="service_image">Image :</label>
                    <input type="file" class="form-control" name="service_image" value="{{ $service->service_image }}"/>
                </div>
                <div class="form-group">
                    <label for="service_status">Status :</label>
                    <input type="text" class="form-control" name="service_status" value="{{ $service->service_status }}"/>
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
