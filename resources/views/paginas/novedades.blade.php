@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-2 font-size-12">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-dark">Inicio</a>
            </li>
            <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Novedades</li>
        </ol>
    </div>
</div>  
@isset($newss)
	@if(count($newss))
		<section class="py-5">
			<div class="container mx-auto row">
				<div class="col-sm-12 col-md-9">
					<div class="row">
						@foreach ($newss as $neww)
							<div class="col-sm-12 col-md-4 mb-3">
								@include('paginas.partials.novedad', ['new' => $neww]) 
							</div>
						@endforeach	
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
		</section>
	@endif
@endisset

@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
	<style>
		.slick-slide{
			padding: 0 10px;
		}
		.slick-dots li button:before {
			font-family: 'slick';
			position: absolute;
			content: '';
			top: 30px;
			left: 0;
			width: 25px;
			height: 5px;
			opacity: .25;
			background-color: gray;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{ asset('vendor/slick/slick.js') }}"></script>
	<script>
		$('.carrusel').slick({
			dots: true,
			infinite: false,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 3,
			autoplay:true,
			autoplaySpeed: 3000,
			speed: 3000,
			responsive: [
				{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
				},
				{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
				},
				{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
				}
			]
		});
	</script>
@endpush
