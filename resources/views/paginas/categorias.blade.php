@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-12">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-dark">Inicio</a>
            </li>
            <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Productos</li>
        </ol>
    </div>
</div>  
<div class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-sm-12 col-md-3 mb-5">
                    @includeIf('paginas.partials.categoria', ['category' => $category])
                </div> 
            @endforeach
        </div>
    </div>
</div>  
@endsection
@push('scripts')
@endpush
