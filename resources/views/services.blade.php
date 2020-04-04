@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Services</h1>
@stop

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <br />

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Details</h3>
            </div>
            <div class="panel-body">
                <br />
                <form method="post" action="{{ route('services.store') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4" align="right">Category ID</label>
                            <div class="col-md-4">
                                <input type="text" name="category_id" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4" align="right">Service Name</label>
                            <div class="col-md-4">
                                <input type="text" name="service_name" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4" align="right">Service Description</label>
                            <div class="col-md-4">
                                <input type="text" name="service_desc" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4" align="right">Select Service Image</label>
                            <div class="col-md-8">
                                <input type="file" name="service_image" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4" align="right">Service Status</label>
                            <div class="col-md-4">
                                <input type="text" name="service_status" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group" align="center">
                        <br />
                        <br />
                        <input type="submit" name="service_image" class="btn btn-primary" value="Save" />
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">User Data</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="10%">Category ID</th>
                            <th width="20%">Service Name</th>
                            <th width="25%">Description</th>
                            <th width="10%">Status</th>
                            <th width="10%">Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($tbl_service as $tbl_service)
                            <tr>
                                <td>{{ $tbl_service->category_id }}</td>
                                <td>{{ $tbl_service->service_name }}</td>
                                <td>{{ $tbl_service->service_desc }}</td>
                                <td>{{ $tbl_service->service_status }}</td>
                                <td> <img src="{{asset('uploads/service/'.$tbl_service->service_image) }}" width="100px;" height="100px;" alt="Image"></td>
                                <td> <a href="/editservice/{{$tbl_service->id}}" class="btn btn-success">Edit</a> </td>
                                <td> <a href="" class="btn btn-danger">Delete</a> </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
