<header class="header py-2 d-sm-none d-md-block bg-blue-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center flex-wrap text-white">
                        <div class="d-flex me-3">
                            <i class="fas fa-map-marker-alt text-white d-block me-2"></i>
                            <a href="#" class="d-block text-white m-0 font-size-14"> {{ $data->address }}</a>
                        </div>
                        <div class="mb-xs-2 mb-md-0 me-3">
                            <i class="fas fa-phone-alt text-white font-size-14 me-1 text-white"></i> 
                            @php $phone = Str::of($data->phone1)->explode('|') @endphp
                            @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                            @if (count($phone) == 2)
                                <a href="tel:{{$phone[0]}}" class="text-white text-decoration-none font-size-14 underline">{{ $phone[1] }}</a>
                            @else 
                                <a href="tel:{{$data->phone1}}" class="text-white text-decoration-none font-size-14 underline">{{ $data->phone1 }}</a>
                            @endif
                            @if (count($phone2) == 2)
                                <span class="text-white">/</span>
                                <a href="tel:{{$phone2[0]}}" class="text-white text-decoration-none font-size-14 underline">{{ $phone2[1] }}</a>
                            @else 
                                <span class="text-white">/</span>
                                <a href="tel:{{$data->phone2}}" class="text-white text-decoration-none font-size-14 underline">{{ $data->phone2 }}</a>
                            @endif
                        </div>
                        <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-white text-decoration-none font-size-14 underline">
                            <i class="fas fa-envelope text-white font-size-14 me-1"></i> {{ $data->email }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light w-100">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
            <ul class="navbar-nav position-relative align-items-center">
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('productos') || Request::is('producto/*') || Request::is('categorias') || Request::is('categoria/*')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('productos') || Request::is('producto/*') || Request::is('categorias') || Request::is('categoria/*')) active @endif" href="{{ route('categorias') }}">Productos</a>
                </li>    
                <li class="nav-item @if(Request::is('novedades') || Request::is('novedad/*')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('novedades') || Request::is('novedad/*')) active @endif" href="{{ route('novedades') }}">Novedades</a>
                </li>    
                <li class="nav-item @if(Request::is('lista-de-precios')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('lista-de-precios')) active @endif" href="{{ route('lista-de-precios') }}">Lista de precios</a>
                </li>            
                <li class="nav-item @if(Request::is('solicitud-de-presupuesto')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('solicitud-de-presupuesto')) active @endif" href="{{ route('solicitud-de-presupuesto') }}" >Solicitud de cotización</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
