@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
@can('admin.posts.create')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Nuevo post
    </a>
@endcan
    <h1>Lista de Posts</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-danger">
        {{ session('info') }}
    </div>
@endif
    @livewire('admin.posts-index')
@stop

@section('js')
@stop