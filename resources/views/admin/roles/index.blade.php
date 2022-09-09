@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- @can('admin.roles.create') --}}
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.roles.create') }}">
            Add role
        </a>
    {{-- @endcan --}}
    <h1>Role list</h1>
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
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{ $role->id }}
                            </td>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td width="10px">
                                {{-- @can('admin.roles.edit') --}}
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', $role) }}">Edit</a>
                                {{-- @endcan --}}
                            </td>
                            <td width="10px">
                                {{-- @can('admin.roles.destroy') --}}
                                    <form method="POST" action="{{ route('admin.roles.destroy', $role) }}">
                                        @csrf

                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop