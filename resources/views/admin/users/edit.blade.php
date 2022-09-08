@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit user</h1>
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
            <p class="h5">
                Name:
            </p>
            <p class="form-control">
                {{ $user->name }}
            </p>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}

                @include('admin.users.partials.form')

                {!! Form::submit('Update user', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop