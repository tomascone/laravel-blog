@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit role</h1>
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
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT', 'autocomplete' => 'off']) !!}

                @include('admin.roles.partials.form')

                {!! Form::submit('Update role', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop