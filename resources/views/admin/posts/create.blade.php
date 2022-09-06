@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create new post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name of the post']) !!}

                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter slug of the post', 'readonly']) !!}

                    @error('slug')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category') !!}

                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                    @error('color')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">
                        Tags
                    </p>
                    @foreach ($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </div>

                <div class="form-group">
                    {!! Form::label('extract', 'Extract') !!}

                    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Post body') !!}

                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">
                        Status
                    </p>

                    <label for="">
                        {!! Form::radio('status', 1, true) !!}
                        Draft
                    </label>

                    <label for="">
                        {!! Form::radio('status', 2) !!}
                        Published
                    </label>
                </div>

                {!! Form::submit('Create post', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop