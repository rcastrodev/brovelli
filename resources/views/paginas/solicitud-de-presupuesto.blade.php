@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-12 mb-5">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-dark">Inicio</a>
            </li>
            <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Solicitud de cotización</li>
        </ol>
    </div>
</div>  
<div class="container mx-auto">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    @endif
    @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
    @endif
    <form action="{{ route('send-quote') }}" method="post" id="cotizadorOnline" enctype="multipart/form-data" class="py-sm-2 py-md-5" style="color: #666666;">
        @csrf
        <div class="row w-75 mx-auto">
            <div class="col-sm-12 font-size-24 pb-3 mb-5 pb-3" style="border-bottom: 1px solid #D8D8D8">
                <h2 class="text-blue-2"><img src="{{ asset('images/edit.svg') }}" class="img-fluid me-2"> Datos Personales</h2>
            </div>
            <div class="col-sm-12 col-md-6 mb-3">
                <div class="form-group">
                    <label for="">Nombre *</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control valid">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-3">
                <div class="form-group">
                    <label for="">Correo electroníco *</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control valid">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-3">
                <div class="form-group">
                    <label for="">Teléfono *</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control valid">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-3">
                <div class="form-group">
                    <label for="">Empresa</label>
                    <input type="text" name="company" value="{{ old('company') }}" class="form-control" placeholder="Empresa">
                </div>
            </div>
            @if (session('vps'))
                <div class="col-sm-12 font-size-24 pb-3 mb-5 pb-3 mt-5" style="border-bottom: 1px solid #D8D8D8">
                    <h2 class="text-blue-2"><img src="{{ asset('images/edit.svg') }}" class="img-fluid me-2"> Detalle de productos</h2>
                </div>
                <div class="col-sm-12 table-responsive">
                    <table id="table"  class="table table-striped producto-variable font-size-14 mb-4">
                        <thead class="text-blue-2 fw-bold">
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
                        <tbody>
                            @foreach (session('vps') as $vp)
                                <tr>
                                    <td>
                                        <img src="{{$vp['image']}}" width="80" class="d-block mx-auto">
                                    </td>
                                    <td>
                                        {{ $vp['code'] }}
                                        <input type="hidden" name="variableproduct[{{$vp['id']}}][code]" value="{{ $vp['code'] }}">
                                    </td>
                                    <td>
                                        {{ $vp['name'] }}
                                        <input type="hidden" name="variableproduct[{{$vp['id']}}][name]" value="{{ $vp['name'] }}">
                                    </td>
                                    <td>
                                        {{ $vp['diameter'] }}
                                        <input type="hidden" name="variableproduct[{{$vp['id']}}][diameter]" value="{{ $vp['diameter'] }}">
                                    </td>
                                    <td>
                                        {{ $vp['material'] }}
                                        <input type="hidden" name="variableproduct[{{$vp['id']}}][material]" value="{{ $vp['material'] }}">
                                    </td>
                                    <td>
                                        <div class="form-group" style="max-width: 100px;">
                                            <input type="number" name="variableproduct[{{$vp['id']}}][amount]" min="1" value="{{ $vp['amount'] }}" class="form-control">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm bg-blue-2 text-white rounded-circle font-size-11 removeItem fas fa-times"
                                        data-url="{{ route('vp.destroy', ['id' => $vp['id']]) }}"></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif             
            <div class="col-sm-12 mb-3 mt-5">
                <img src="{{ asset('images/chat.svg') }}" class="img-fluid me-2"> <label class="text-blue-dark fw-bold">COMENTARIOS</label>
            </div>
            <div class="col-sm-12 col-md-6 mb-3">
                <div class="form-group">
                    <textarea name="message" class="form-control" cols="30" rows="5">{{ old('message') }}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-sm-3 mb-md-5">
                <label for="">Adjuntar archivo</label><br>
                <input type="file" name="file" class="form-control-file">
            </div>
            <div class="d-flex flex-sm-column flex-md-row justify-content-between col-sm-12 mt-4">
                <a href="{{ route('categorias') }}" class="btn px-5 py-2 text-blue-2 mb-sm-3 mb-md-0" style="border-radius:0; border: 1px solid #2E3191;">+ Agregar más productos</a>
                <button class="btn px-5 py-2 text-white bg-blue-2" style="border-radius:0;">Enviar solicitud</button>
            </div>
        </div>

    </form>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@endpush