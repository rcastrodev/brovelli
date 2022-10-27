@extends('paginas.partials.app')
@section('content')
@if(count($sliders))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators d-sm-none d-md-block">
			@foreach ($sliders as $k => $slide)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if (!$k) active @endif" aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner h-100">
			@foreach ($sliders as $k => $slide)
				<div class="carousel-item h-100 @if (!$k) active @endif" style="background-image: url({{ asset($slide->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					@if ($slide->content_1)
						<div class="carousel-caption container">
							<div class="text-start" style="max-width: 500px;">
								<h2 class="font-size-48 text-blue-2 mb-3">{{ $slide->content_1 }}</h2>
								<p class="font-size-17 mb-5 text-dark mb-5 d-sm-none d-md-block">{{ $slide->content_2 }}</p>
								<a href="{{ route('contacto') }}" class="bg-blue-2 px-5 py-2 btn text-white font-size-16" style="border-radius: 0">Más información</a>
							</div>
						</div>			
					@endif
				</div>			
			@endforeach
		</div>
	</div>
@endif
@isset($categories)
	@if(count($categories))
		<section id="categories" class="py-5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h5 class="text-center text-blue-2 font-size-38 mb-5">Productos</h5>
					</div>
					@foreach ($categories as $category)
						<div class="col-sm-12 col-md-3 mb-4">
							@includeIf('paginas.partials.categoria', ['category' => $category])
						</div>
					@endforeach
				</div>
			</div>
		</section>
	@endif
@endisset
@isset($section2)
	<div class="row mb-5 mx-0">
		<div class="col-sm-12 col-md-6 px-0">
			@if (Storage::disk('public')->exists($section2->image))
				<img src="{{ asset($section2->image) }}" class="img-fluid">				
			@endif
		</div>
		<div class="col-sm-12 col-md-6 py-sm-2 py-md-5">
			<h4 class="mb-5 text-blue-2 fw-bold font-size-34">{{ $section2->content_1 }}</h4>
			<div class="mb-5 text-dark font-size-20 fw-light">{!! $section2->content_2 !!}</div>
			<a href="{{ route('contacto') }}" class="bg-blue-2 px-5 py-2 btn text-white font-size-16" style="border-radius: 0">Más información</a>
		</div>
	</div>
@endisset
@isset($news)
	@if(count($news))
		<section id="news" class="py-5 bg-light">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h5 class="text-center text-blue-2 font-size-38 mb-5">Novedades</h5>
					</div>
					<div class="carrusel">	
						@foreach ($news as $new)
							@include('paginas.partials.novedad', ['new' => $new])
						@endforeach	
					</div>

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
		.carousel-indicators [data-bs-target]{
			background-color: gray !important;
		}
		.carousel-indicators{
			text-align: left !important;
			left: 60px !important;
		}
		.carousel-indicators [data-bs-target]{
			border-radius: 0 !important;
    		height: 5px !important;
		}
		html{
			overflow-x: hidden;
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
					slidesToScroll: 2
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
