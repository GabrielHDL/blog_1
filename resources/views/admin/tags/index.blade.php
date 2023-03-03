@extends('adminlte::page')

@section('title', 'Etiquetas')

@section('content_header')
{{-- @can('admin.categories.create') --}}
    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Nueva Etiqueta
    </a>
{{-- @endcan --}}
    <h1>Lista de etiquetas</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-danger">
        {{ session('info') }}
    </div>
@endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px">
                                {{-- @can('admin.categories.edit') --}}
                                    <a href="{{route('admin.tags.edit', $tag)}}" class="btn btn-sm btn-primary">Editar</a>
                                {{-- @endcan --}}
                            </td>
                            <td width="10px">
                                {{-- @can('admin.categories.destroy') --}}
                                    <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
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