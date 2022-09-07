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

    @error('category_id')
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

    @error('tags')
        <br>
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            <img id="picture" src="  
                @if(isset($post->image))
                    @if(Storage::has($post->image->url))
                        {{ Storage::url($post->image->url) }}
                    @else
                        {{ $post->image->url }}
                    @endif
                @else 
                    https://cdn.pixabay.com/photo/2021/09/22/08/35/architecture-6646154_960_720.jpg
                @endif
            " alt="">
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Post image') !!}

            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('file')
            <br>
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extract') !!}

    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    @error('extract')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Post body') !!}

    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
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

    @error('status')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>