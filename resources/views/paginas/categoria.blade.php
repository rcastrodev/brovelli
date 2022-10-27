@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-12">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-dark">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('categorias') }}" class="text-decoration-none text-dark ">Productos</a>
            </li>
            <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">{{$element->name}}</li>
        </ol>
    </div>
</div>  
<div class="py-5">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 order-sm-2 order-md-1">
                @isset($categories)
                    @if (count($categories))
                        <ul class="p-0 font-size-17" style="list-style: none;">
                            @foreach ($categories as $category)
                                <li class="@if($category->id == $element->id) active @endif">
                                    <a href="#" class="toggle d-block p-2 text-decoration-none text-decoration-none text-dark">{{ $category->name }}</a>
                                    <ul class="ps-0 {{ ($element->name == $category->name) ? '' : 'rd-none' }}" style="list-style: none">
                                        @foreach ($category->products as $p)
                                            <li>
                                                <a href="{{ route('producto', ['id'=> $p->id ]) }}" class="text-dark text-decoration-none d-block py-1 ms-4"> {{ $p->name }} </a>
                                            </li>                            
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>            
                    @endif   
                @endisset
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14 order-sm-1 order-md-2">
                <div class="row">
                    @if (count($products))
                        @foreach ($products as $product)
                            <div class="col-sm-12 col-md-4 mb-4">
                                @includeIf('paginas.partials.producto', ['product' => $product])
                            </div>
                        @endforeach
                    @else
                        <h5 class="text-center">No tenemos productos cargados en la categoría seleccionada</h5>
                    @endif

                </div>                                
            </section>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
