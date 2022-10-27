@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-12">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-dark">Inicio</a>
            </li>
            <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Novedades</li>
        </ol>
    </div>
</div>  
@isset($new)
    <section class="py-5">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <div class="card card-new d-block text-decoration-none" style="border: none !important;">
                        <div class="position-relative">
                            @if ($new->image)
                                <img src="{{ asset($new->image) }}" class="card-img-top img-fluid w-100" alt="{{$new->content_1}}">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-fluid w-100" alt="{{$new->content_1}}">	
                            @endif
                        </div>
                        <div class="card-body bg-white">
                            <strong class="text-blue-2 d-block mb-2 text-uppercase">{{ $new->content_3 }}</strong>
                            <strong class="card-title font-size-20 text-dark d-block mb-5">{{$new->content_1}}</strong>
                            <div class="descripcion-novedad">{!! $new->content_2 !!}</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 sidebar-novedades">
                    <h5 class="text-blue-2 mb-3">CATEGORÍAS</h5>
                    <ul class="">
                        <li class="py-1 position-relative">
                            <a href="{{ route('novedades', ['categoria'=> 'Empresa']) }}" class="text-decoration-none text-dark">Empresa</a>
                            <i class="fal fa-arrow-right position-absolute text-blue-1" style="right: 10px; top: 9px; font-size: 13px;"></i>
                        </li>
                        <li class="py-1 position-relative" style="border-top: none;">
                            <a href="{{ route('novedades', ['categoria'=> 'Productos']) }}" class="text-decoration-none text-dark">Productos</a>
                            <i class="fal fa-arrow-right position-absolute text-blue-1" style="right: 10px; top: 9px; font-size: 13px;"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endisset
@endsection
@push('head')
@endpush
@push('scripts')
@endpush
