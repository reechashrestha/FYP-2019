@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Category</h1>
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

            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="category-name">Category Name</label>
                    <input type="text" name="category_name"
                           value="{{ old('category_name') }}" class="form-control" id="category-name">
                </div>
                <div class="form-group">
                    <label for="category-description">Description</label>
                    <textarea name="category_description" class="form-control" id="category-description" rows="2">{{ old('category_description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category-status">Status</label>
                    <input type="text" name="category_status"
                           value="{{ old('category_status') }}" class="form-control" id="category-status">
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
