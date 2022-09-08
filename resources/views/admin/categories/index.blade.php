@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @can('admin.categories.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.categories.create') }}">
            Add category
        </a>
    @endcan
    <h1>Category List</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th colspan="2">
                            
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->id }}
                            </td>
                            <td>
                                {{ $category->name }}
                            </td>

                            <td width="10px">
                            
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                                @endcan
                            </td>
                            
                            <td width="10px">

                                @can('admin.categories.destroy')
                                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                                        @csrf

                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop