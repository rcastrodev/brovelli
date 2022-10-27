@extends('paginas.partials.app')
@section('content')
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3283.406260017457!2d-58.529316984976035!3d-34.61917248045547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sve!4v1649277502989!5m2!1ses!2sve" height="464" style="border:0; width:100%;" allowfullscreen="" loading="lazy" ></iframe>
<div class="my-5">
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
        <div class="row w-75 mx-auto mb-5 text-center pb-4" style="border-bottom:1px solid #D8D8D8">
            <div class="col-sm-12 col-md-4 mb-3 px-4">
                <i class="font-size-30 far fa-map-marker-alt text-blue-1"></i>
                <div class="mt-3 text-center">{{ $data->address }}</div>
            </div>
            <div class="col-sm-12 col-md-4 mb-3 px-4">
                <i class="font-size-30 far fa-phone-alt text-blue-1"></i>
                @php $phone = Str::of($data->phone1)->explode('|') @endphp
                @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                <div class="mt-3 text-center">
                    @if(count($phone) == 2)
                        <a href="tel:{{$phone[0]}}" class="text-dark text-decoration-none underline">{{ $phone[1] }}</a>
                    @else
                        <a href="tel:{{$data->phone1}}" class="text-dark text-decoration-none underline">{{ $data->phone1 }}</a>
                    @endif
                    @if(count($phone2) == 2)
                        <span class="text-dark">/</span>
                        <a href="tel:{{$phone2[0]}}" class="text-dark text-decoration-none underline">{{ $phone2[1] }}</a>
                    @else
                        <a href="tel:{{$data->phone2}}" class="text-dark text-decoration-none underline">{{ $data->phone2 }}</a>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-3 px-4">
                <i class="font-size-30 fal fa-envelope text-blue-1"></i>
                <div class="mt-3 text-center">{{ $data->email }}</div>
            </div>
        </div>
        <div class="text-blue-2 fw-bold mb-4 w-75 mx-auto">Por favor, complete el siguiente formulario para que podamos contactarnos con usted a la brevedad.</div>
        <form action="{{ route('send-contact') }}" method="post" class="w-75 mx-auto">
            @csrf
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 mb-sm-3 mb-sm-3">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="text" name="telefono" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 mb-sm-3 mb-sm-3">
                    <div class="form-group">
                        <label for="">Mensaje</label>
                        <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5" placeholder="Escriba un mensaje"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 mb-sm-3">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="termino" id="termino">
                        <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad *</label>
                    </div>
                    <div class="form-group">
                        {!! app('captcha')->display() !!}
                    </div>
                </div>
                <div class="col-sm-12 mb-sm-3 mb-sm-3 text-center">
                    <button type="submit" class="text-uppercase btn bg-blue-2 font-size-14 py-2 mb-sm-3 mb-md-0 text-white px-5" style="border-radius: 0;">Enviar consulta</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
