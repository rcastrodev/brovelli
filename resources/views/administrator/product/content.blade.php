@extends('adminlte::page')
@section('title', 'Producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Producto</h1>
        <a href="{{ route('product.content.create') }}" class="btn btn-sm btn-primary">crear producto</a>
    </div>
@stop
@section('content')
@include('administrator.partials.mensaje-exitoso')
@include('administrator.partials.mensaje-error')
<div class="row">
    <div class="col-sm-12 col-md-6">
        <form action="{{ route('product.import') }}" method="post" data-sync="no" class="my-5"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Subir productos con archivo de excel</label>
                <input type="file" name="products" class="form-control-file">
            </div>
            <button class="btn btn-primary">Subir</button>
        </form>
    </div>
    <div class="col-sm-12 col-md-6">
        <form action="{{ route('variable-product.import') }}" method="post" data-sync="no" class="my-5"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Subir variaciones de productos con archivo de excel</label>
                <input type="file" name="variable-products" class="form-control-file">
            </div>
            <button class="btn btn-primary">Subir</button>
        </form>
    </div>
</div>

<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.product.modals.create')
@includeIf('administrator.product.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('product.content.find')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/product/index.js') }}"></script>
@stop

