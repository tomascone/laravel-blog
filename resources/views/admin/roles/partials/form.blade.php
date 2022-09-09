<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name of the role']) !!}

    @error('name')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">
        Permissions
    </p>
    @foreach ($permissions as $permission)
        <div>
            <label class="mr-2">
                {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                {{ $permission->description }}
            </label>
        </div>
    @endforeach

    @error('permissions')
        <br>
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>