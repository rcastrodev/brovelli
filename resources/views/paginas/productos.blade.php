@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="text-decoration-none text-dark fw-bold">Inicio</a>
                </li>
                <li class="breadcrumb-item active text-dark" aria-current="page">Productos</li>
            </ol>
        </nav>  
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            @isset($products)
                @if (count($products))
                    @foreach ($products as $p)
                        <div class="col-sm-12 col-md-3 mb-sm-3 mb-md-5">
                            @includeIf('paginas.partials.producto', ['product' => $p])
                        </div>  
                    @endforeach  
                @else
                    <h3 class="text-center col-sm-12">No hay encontramos coincidencias</h3>
                @endif      
            @endisset
        </div>
    </div>
</div>  
@endsection
@push('scripts')
@endpush
