<footer class="font-size-14 text-sm-center text-md-start bg-blue-2 pt-5">
    <div class="row justify-content-between container mx-auto">
        <div class="col-sm-12 col-md-4 py-sm-2 py-md-5 d-sm-none d-md-block">
            <div class="row justify-content-between">
                <div class="col-sm-12">    
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-uppercase text-white font-weight-600 mb-4">Secciones</h6>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <a href="{{ route('index') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">Home</a>
                            <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">Empresa</a>
                            <a href="{{ route('productos') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">Productos</a>
                            <a href="{{ route('novedades') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">Novedades</a>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <a href="{{ route('lista-de-precios') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">Lista de precios</a>
                            <a href="{{ route('solicitud-de-presupuesto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">Solicitud de cotización</a>
                            <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 underline">Contacto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 py-sm-3 py-md-5">
            <div class="row">
                <div class="col-sm-12 newsletter">
                    <h6 class="text-uppercase mb-4 text-white">SUSCRIBITE AL NEWSLETTER</h6>
                    <form action="{{ route('newsletter.store') }}" id="formNewsletter">
                        @csrf
                        <div class="">
                            <div class="input-group font-size-12">
                                <input type="email" name="email" autocomplete="off" class="form-control font-size-12" placeholder="Ingresa tu email" style="background-color: #f9f9f9; border-radius:0px;">
                                <button type="submit" id="" class="input-group-text bg-blue-1 text-white"  style="border: none; border-radius:0px;"><i class="fal fa-arrow-right text-white"></i></button>
                            </div>
                            <div id="mensaje-newsletter" class="text-white"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 font-size-13 px-sm-3 px-md-0 py-sm-3 py-md-5">
            <h6 class="text-uppercase text-white font-weight-600 mb-4">contacto</h6>
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center mb-2">
                        <i class=" fas fa-map-marker-alt text-light d-block me-2"></i>
                        <address class="d-block text-light m-0"> {{ $data->address }}</address>
                    </div>
                    @php $phone = Str::of($data->phone1)->explode('|') @endphp
                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                    <div class="d-flex align-items-center mb-2">
                        <i class=" fas fa-phone-alt text-light d-block me-2"></i>
                        @if(count($phone) == 2)
                            <a href="tel:{{$phone[0]}}" class="text-light text-decoration-none underline">{{ $phone[1] }}</a>
                        @else
                            <a href="tel:{{$data->phone1}}" class="text-light text-decoration-none underline">{{ $data->phone1 }}</a>
                        @endif
                        @if(count($phone2) == 2)
                            <span class="text-light">/</span>
                            <a href="tel:{{$phone2[0]}}" class="text-light text-decoration-none underline">{{ $phone2[1] }}</a>
                        @else
                            <a href="tel:{{$data->phone2}}" class="text-light text-decoration-none underline">{{ $data->phone2 }}</a>
                        @endif
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class=" fas fa-envelope text-light d-block me-2"></i><span class="d-block"></span>
                        <a href="mailto:{{ $data->email }}" class="text-light text-decoration-none underline">{{ $data->email }}</a>             
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="font-size-14" style="background-color: #FAFBFB;">
    <div class="py-2 d-flex justify-content-between flex-wrap container mx-auto text-dark">
        <div>
            <i class="far fa-copyright"></i> 
            Copyright 2022 Brovelli y Cia S.R.L. Todos los derechos reservados
        </div>
        <a href="https://osole.com.ar/" target="_blank" class="text-dark text-decoration-none underline fw-bold">By Osole</a>
    </div>
</div>
@if($data->phone3)
    <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>
@endif
