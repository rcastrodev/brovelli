@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="text-decoration-none text-dark fw-bold">Inicio</a>
                </li>
                <li class="breadcrumb-item active text-dark" aria-current="page">Servicios</li>
            </ol>
        </nav>  
    </div>
</div>
<section id="service" class="py-sm-4 pb-md-5 pt-md-4">
    <div class="container">
        <div class="row m-0">
            @isset($services)
                @if(count($services))
                    @foreach ($services as $service)
                        <div class="col-sm-12 col-md-6 mb-4">
                            <div class="card card-service position-relative">
                                <div class="position-relative">
                                    <img src="{{ asset($service->img) }}" class="card-img-top img-fluid" alt="{{$service->name}}">
                                </div>
                                <div class="card-body bg-white">
                                      <h5 class="card-title fw-normal">{{$service->name}}</h5>
                                      <p class="card-text mb-4">{!! $service->description !!}</p>
                                      <a href="{{ route('contacto') }}" class="text-white bg-dark text-uppercase btn ">consultar</a>
                                </div>
                            </div>
                        </div>       
                    @endforeach
                @else
                    <h3 class="col-sm-12 text-center">No hay servicios cargados</h3>
                @endif
            @endisset
        </div>
    </div>
</section>
@endsection
@push('scripts')
@endpush