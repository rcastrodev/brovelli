@extends('adminlte::page')
@section('title', 'categorías')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Categorías</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear categoría</button>
    </div>
@stop
@section('content')
@include('administrator.partials.mensaje-exitoso')
@include('administrator.partials.mensaje-error')
<form action="{{ route('category.import') }}" method="post" data-sync="no" class="my-5"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Subir categorías con archivo de excel</label>
        <input type="file" name="categories" class="form-control-file">
    </div>
    <button class="btn btn-primary">Subir</button>
</form>
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.category.modals.create')
@includeIf('administrator.category.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('category.content')}}">
    <meta name="content_find" content="{{route('category.content.find')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/category/index.js') }}"></script>
@stop

