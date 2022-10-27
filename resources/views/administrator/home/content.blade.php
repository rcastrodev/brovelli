@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
@include('administrator.partials.mensaje-exitoso')
@include('administrator.partials.mensaje-error')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Pre título</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section2)
    <section>
        <form action="{{ route('home.content.update-section') }}" method="post" class="row mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$section2->id}}">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    @if(Storage::disk('public')->exists($section2->image)) 
                        <div class="">
                            <img src="{{ asset($section2->image) }}" class="img-fluid w-100" style="object-fit: cover; max-height: 350px;"> 
                        </div>  
                    @endif
                    <input type="file" name="image" class="form-control-file mb-3">
                    <small>Tamaño recomendado para la image 606x340px</small>
                </div>  
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{ $section2->content_1 }}" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" id="" cols="30" rows="10" class="ckeditor">{{$section2->content_2}}</textarea>
                </div>
            </div>
            <div class="text-right col-sm-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </section>
@endisset
@includeIf('administrator.home.modals.create')
@includeIf('administrator.home.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
@stop

