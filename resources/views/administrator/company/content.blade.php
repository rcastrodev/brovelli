@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
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
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section_2)
<section>
    <form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
        @csrf
        <h4 class="col-sm-12 mb-4">Empresa</h4>
        <input type="hidden" name="id" value="{{$section_2->id}}">
        <div class="col-sm-12 col-md-2">
            <label for="">Contenido</label>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <textarea name="content_1" id="" cols="30" rows="10" class="ckeditor">{{$section_2->content_1}}</textarea>
            </div>
        </div>
        <div class="col-sm-12">
            <small>Tamaño recomendado para la image 606x340px</small>
        </div>
        <div class="col-sm-12 row image-delete">
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <input type="file" name="image" class="form-control-file mb-3">
                    @if(Storage::disk('public')->exists($section_2->image)) 
                        <div class="position-relative">
                            <button class="btn btn-danger image rounded-circle far fa-trash-alt position-absolute" 
                            data-url="{{ route('content.destroy-image', ['id'=> $section_2->id, 'reg' => 'image']) }}" 
                            data-campo="content_3"
                            style="top: -10px;
                            right: 0;" data-url=""></button>

                            <img src="{{ asset($section_2->image) }}" alt="" class="img-fluid"> 
                        </div>  
                    @endif
                </div> 
            </div>  
        </div>
        <div class="text-right col-sm-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</section>
@endisset
@isset($section_3s)
    <div class="row">
        @foreach ($section_3s as $s3)
            <form action="{{ route('company.content.updateInfo') }}" method="post" class="row col-sm-12 col-md-4 mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $s3->id }}">
                <div class="col-sm-12 image-delete">
                    <div class="">
                        @if(! Storage::disk('public')->exists($s3->image)) 
                            <div class="" style="height: 70px;"></div>
                        @endif
                        <div class="form-group">
                            @if(Storage::disk('public')->exists($s3->image)) 
                                <div class="position-relative">
                                    <button class="btn btn-danger image rounded-circle far fa-trash-alt position-absolute" 
                                    data-url="{{ route('content.destroy-image', ['id'=> $s3->id, 'reg' => 'image']) }}" 
                                    data-campo="content_3"
                                    style="top: -10px;
                                    right: 0;" data-url=""></button>
                                    <img src="{{ asset($s3->image) }}" alt="" class="img-fluid"> 
                                </div>  
                            @endif
                            <input type="file" name="image" class="form-control-file mb-3">
                        </div> 
                    </div>  
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea name="content_1" id="" cols="30" rows="10" class="ckeditor">{{$s3->content_1}}</textarea>
                    </div>
                </div>
                <div class="text-right col-sm-12">
                    <button type="submit" class="btn btn-danger eliminar-content-ajax mr-2" data-url="{{ route('content.destroy.ajax', ['id'=> $s3->id]) }}">Borrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        @endforeach 
        <form action="{{ route('company.content.createInfo') }}" method="post" class="row col-sm-12 col-md-4 mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="section_id" value="5">
            <div class="col-sm-12 image-delete">
                <div class="">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file mb-3">
                    </div> 
                </div>  
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <textarea name="content_1" id="" cols="30" rows="10" class="ckeditor" placeholder="Contenido"></textarea>
                </div>
            </div>
            <div class="text-right col-sm-12">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex">
            <h4>Linea de tiempo</h4>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-weather">crear</button>
        </div>
        
        <table id="page_table_weather" class="table">
            <thead>
                <tr>
                    <th>Año</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@includeIf('administrator.company.weather.create')
@includeIf('administrator.company.weather.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop
@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

