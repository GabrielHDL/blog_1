<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Rol']) !!}

    @error('name')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>                        
    @enderror
</div>

<h2 class="h3">Permisos</h2>

@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=> 'mr-1']) !!}
            {{ $permission->description }}
        </label>
    </div>
@endforeach