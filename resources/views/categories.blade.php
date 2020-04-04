@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categories</h1>
@stop
@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-success">Add</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">Category ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Description</th>
            <th scope="col">Category Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $category)
            <tr>
                <th scope="row">{{ $category->category_id }}</th>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_description  }}</td>
                <td>{{ $category->category_status }}</td>
                <td class="table-buttons">
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">
                        <i class="fas fa-pencil-alt" ></i>
                    </a>
                    <form method="POST" action="{{ route('categories.destroy', $category) }}">
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
