<div class="form-group">
    <p class="font-weight-bold">
        User roles
    </p>
    @foreach ($roles as $rol)
        <label class="mr-2">
            {!! Form::checkbox('roles[]', $rol->id, null) !!}
            {{ $rol->name }}
        </label>
    @endforeach

    @error('roles')
        <br>
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>