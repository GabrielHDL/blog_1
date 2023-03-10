@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Nuevo rol
    </a>
    <h1>Roles</h1>
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
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-sm btn-primary">Editar</a>   
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop