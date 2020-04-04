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

            <form method="post" action="{{ route('categories.update', $category->category_id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="category_name">Category Name:</label>
                    <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}"/>
                </div>
                <div class="form-group">
                    <label for="category_description">Description :</label>
                    <input type="text" class="form-control" name="category_description" value="{{ $category->category_description }}"/>
                </div>
                <div class="form-group">
                    <label for="category_status">Status :</label>
                    <input type="text" class="form-control" name="category_status" value="{{ $category->category_status }}"/>
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
