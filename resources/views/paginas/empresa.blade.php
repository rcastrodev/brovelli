@extends('paginas.partials.app')
@section('content')
@isset($sliders)
	@if(count($sliders))
		<div id="sliderEmpresa" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="contenedor-breadcrumb position-absolute w-100" style="background-color: #f8f9fa8a !important; top:0; z-index:100;">
				<div class="container">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb text-uppercase py-2 font-size-13">
							<li class="breadcrumb-item">
								<a href="{{ route('index') }}" class="text-decoration-none text-dark fw-bold">Inicio</a>
							</li>
							<li class="breadcrumb-item active text-dark" aria-current="page">Empresa</li>
						</ol>
					</nav>  
				</div>
			</div>
			<div class="carousel-indicators d-sm-none d-md-block">
				@foreach ($sliders as $k => $slide)
					<button type="button" data-bs-target="#sliderEmpresa" data-bs-slide-to="{{$k}}" class="@if (!$k) active @endif" aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner h-100">
				@foreach ($sliders as $k => $slide)
					<div class="carousel-item h-100 @if (!$k) active @endif" style="background-image: linear-gradient(rgb(0 0 0 / 48%),rgba(0, 0, 0, 0.1)), url({{ asset($slide->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
						<div class="container mx-auto content-slider-empresa">
							<h2 class="font-size-50 fw-bold text-white">{{ $slide->content_1 }}</h2>
						</div>
					</div>		
				@endforeach
			</div>
		</div>
	@endif	
@endisset
@isset($section2)
	@if($section2)
		<section id="section_2" class="py-sm-2 pt-md-5">
			<div class="container py-sm-0 py-md-3">
				<div class="row">
					<div class="col-sm-12 col-md-6 fw-light">{!! $section2->content_1 !!}</div>
					<div class="col-sm-12 col-md-6 d-flex justify-content-center flex-column">
						@foreach ($section3s as $s3)
							<div class="d-flex align-items-center flex-sm-column flex-md-row mb-3 ms-sm-1 ms-md-4">
								<div class="bg-blue-1 me-sm-0 me-md-2 p-3 mb-sm-3 mb-md-0" style="border-radius:100%;">
									<img src="{{ asset($s3->image) }}" class="img-fluid img-icon">
								</div>
								<div class="mb-0">{!! $s3->content_1 !!}</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
	@endif	
@endisset
@isset($section4s)
	@if(count($section4s))
		<div class="py-5 bg-blue-2 d-sm-none d-md-block" style="border-bottom: 1px solid #f5f5dc82;">
			<div class="container mx-auto my-5 ">
				<div class="timeline-container timeline-theme-1">
					<div class="timeline js-timeline">
						@foreach ($section4s as $s4)
							<div data-time="{{ $s4->content_2 }}">{!! $s4->content_1 !!}</div>			
						@endforeach
					</div>
				</div>
			</div>
		</div>
	@endif
@endisset

@endsection

@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/timeline/timeline.css') }}" />
	<style>
		.carousel-indicators{
			text-align: left !important;
			left: 60px !important;
		}
		.carousel-indicators [data-bs-target]{
			border-radius: 0 !important;
    		height: 5px !important;
		}
		.mb-0 p{
			margin-bottom: 0 !important;
		}
		.img-icon{
			max-height: 68px;
			max-width: 68px;
		}
		.content-slider-empresa{
			margin-top: 200px !important;
		}
		@media( max-width: 768px ){
			.content-slider-empresa{
				margin-top: 100px !important;
			}
		}
	</style>
@endpush
@push('scripts')
	<script src="{{ asset('vendor/timeline/timeline.js') }}"></script>
	<script>
		$('.js-timeline').Timeline({
			dotsPosition: 'top',
		});
	</script>
@endpush

       
