@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
{{-- @can('admin.posts.create') --}}
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Nuevo post
    </a>
{{-- @endcan --}}
    <h1>Lista de Posts</h1>
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
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td width="10px">
                                {{-- @can('admin.posts.edit') --}}
                                    <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-sm btn-primary">Editar</a>
                                {{-- @endcan --}}
                            </td>
                            <td width="10px">
                                {{-- @can('admin.posts.destroy') --}}
                                    <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
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