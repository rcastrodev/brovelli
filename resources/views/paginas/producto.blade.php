@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-12">
    <div class="container">
        <ol class="breadcrumb text-uppercase py-2 font-size-13">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-dark">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('categorias') }}" class="text-decoration-none text-dark">Productos</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('categoria', ['id' => $product->category->id]) }}" class="text-decoration-none text-dark">{{$product->category->name}}</a>
            </li>
            <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">{{ $product->name }}</li>
        </ol>
    </div>
</div>   
@isset($product)
    <div class="py-5">
        <div class="container">
            <div class="row">
                <aside class="col-sm-12 col-md-3 order-sm-2 order-md-1">
                    @isset($categories)
                        @if (count($categories))
                            <ul class="p-0 font-size-17" style="list-style: none;">
                                @foreach ($categories as $category)
                                    <li class="@if($category->name == $product->category->name) active @endif">
                                        <a href="#" class="toggle d-block p-2 text-decoration-none text-decoration-none text-dark">{{ $category->name }}</a>
                                        <ul class="ps-0 {{ ($category->name == $product->category->name) ? '' : 'rd-none' }}" style="list-style: none">
                                            @foreach ($category->products as $p)
                                                <li class="{{ ($p->name == $product->name) ? 'activee' : '' }}">
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
                    <div class="row mb-5">
                        <div class="col-sm-12 col-md-5">
                            <div id="carruselProducto" class="carousel slide carousel-fade border border-light border-2 mb-3" data-bs-ride="carousel" style="">
                                <div class="carousel-inner">
                                    @if (count($product->images))
                                        @foreach ($product->images as $pk => $pv)
                                            <div class="carousel-item @if(!$pk) active @endif">
                                                <img src="{{ asset($pv->image) }}" class="d-block w-100 img-fluid" style="object-fit: cover;
                                                min-width: 100%; max-width: 100%; height: 350px;">
                                            </div>    
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/default.jpg') }}" class="d-block w-100 img-fluid" style="object-fit: cover; min-width: 100%; max-width: 100%;" alt="">
                                        </div>   
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carruselProducto" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carruselProducto" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div> 
                            @if (count($product->images))
                                <div class="d-sm-none d-md-block">
                                    <ul class="d-flex p-0" style="list-style: none; overflow: hidden;">
                                    @foreach ($product->images as $ip)
                                        <li class="me-2" style="border:1px solid rgba(0, 0, 0, 0.125);">
                                            <img src="{{ asset($ip->image) }}" width="85" height="65" style="object-fit: cover;">
                                        </li>                 
                                    @endforeach
                                    </ul>
                                </div>   
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex flex-column justify-content-between">
                            <div class="">
                                <strong class="text-blue-2 mb-2">CÓDIGO {{ $product->code }}</strong>
                                <h1 class="mb-3 font-size-28 text-dark" style="font-weight: 500 !important;">{{ $product->name }}</h1>
                                <div class="font-size-15 mb-md-3 mb-sm-2">{!! $product->description  !!}</div>
                            </div>
                            @if (isset($product->materials))
                                <div class="mb-4">
                                    <h4 class="font-size-15 mb-1">Materiales</h4>
                                    @php $materials = Str::of($product->materials)->explode('|') @endphp
                                    @if (count($materials))
                                        @foreach ($materials as $material)
                                            <span>{{ $material }},</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                            <div class=""></div>
                            <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap">
                                @if($product->data_sheet)
                                    <a href="{{ route('ficha-tecnica', ['id'=>$product->id]) }}" class="bg-blue-2 text-white btn px-5 py-2" style="border-radius: 0;">ficha técnica <i class="fal fa-long-arrow-down ms-2 text-white"></i></a>       
                                @endif
                            </div>
                        </div>
                    </div>         
                    @if (count($product->variableProducts))
                        <div class="row mb-5">
                            <div class="col-sm-12 table-responsive">
                                <table id="tableVP" class="table table-striped text-center font-size-16" style="border-top: 1px solid #D8D8D8;">
                                    <thead class="text-blue-2 fw-bold">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class=""></th>
                                            <th scope="col" class="">Código</th>
                                            <th scope="col" class="">Producto</th>
                                            <th scope="col" class="">Diámetro</th>
                                            <th scope="col" class="">Material</th>
                                            <th scope="col" class="">Cantidad</th>
                                            <th scope="col" class=""></th>
                                        </tr>
                                    </thead>
                                    <tbody class="font-size-14">
                                        @foreach ($product->variableProducts as $vProduct)
                                            <tr>
                                                <td>
                                                    @if (count($product->images))
                                                        @if (Storage::disk('public')->exists($product->images()->first()->image))
                                                            <img src="{{ asset($product->images()->first()->image) }}" class="img-fluid" style="max-width: 70px;">
                                                        @else 
                                                            <img src="{{ asset('images/default.jpg') }}" class="img-fluid" style="max-width: 70px;">
                                                        @endif
                                                    @else 
                                                        <img src="{{ asset('images/default.jpg') }}" class="img-fluid" style="max-width: 70px;">
                                                    @endif
                                                </td>
                                                <td>{{$product->code}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$vProduct->diameter}}</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="material" class="form-control">
                                                            <option value="Escoger material" disabled selected>Escoger material</option>
                                                            @isset($materials)
                                                                @if (count($materials))
                                                                    @foreach ($materials as $material)
                                                                        <option value="{{ $material }}">{{ $material }}</option>
                                                                    @endforeach
                                                                @else
                                                                    <option value="Sin material">Sin material</option>
                                                                @endif
                                                            @endisset
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mx-auto" style="max-width: 100px;">
                                                        <input type="number" name="number" value="" class="form-control" min="1">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <button class="addVP" 
                                                    style="color: #2E3191 !important; border: 1px solid #2E3191;
                                                    border-radius: 0 !important; padding: 10px 25px;"
                                                    data-url="{{ route('vp.store') }}"
                                                    @if (count($product->images))
                                                        data-image="{{ asset($product->images()->first()->image) }}"
                                                    @else
                                                        data-image="{{ asset('images/default.jpg') }}"
                                                    @endif 
                                                    data-id="{{$vProduct->id}}" 
                                                    data-code="{{ $product->code }}"
                                                    data-name="{{ $product->name }}"
                                                    data-diameter="{{ $vProduct->diameter }}"
                                                    >cotizar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>                  
                    @endif                                
                </section>
            </div>
        </div>
    </div>
@endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
