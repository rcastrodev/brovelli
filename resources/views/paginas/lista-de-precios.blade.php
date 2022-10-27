@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-12 mb-5">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-dark">Inicio</a>
            </li>
            <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Lista de precios</li>
        </ol>
    </div>
</div>  
<div class="container mx-auto">
    <h1 class="mb-3 text-blue-2 font-size-24">Lista de precios</h1>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="text-blue-2 fw-bold">
                <tr>
                    <th scope="col" style="width: 280px;">Nombre</th>
                    <th scope="col" style="min-width: 600px;">Incluye</th>
                    <th scope="col" class="text-center" style="width: 150px;">PDF</th>
                    <th scope="col" class="text-center" style="width: 150px;">EXCEL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($elements as $element)
                    <tr class="py-2">
                        <td>{{ $element->content_1 }}</td>
                        <td class="font-size-12">{!! $element->content_2 !!}</td>
                        <td class="text-center">
                            @if(Storage::disk('public')->exists($element->content_3))
                                <a href="{{ route('descargar-archivo', [ 'id'=>$element->id, 'column' => 'content_3']) }}" class="py-2 px-3 bg-blue-2 text-white btn font-size-14">Descargar <i class="fal fa-arrow-down"></i></a>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(Storage::disk('public')->exists($element->content_4))
                                <a href="{{ route('descargar-archivo', [ 'id'=>$element->id, 'column' => 'content_4']) }}" class="py-2 px-3 bg-blue-2 text-white btn font-size-14">Descargar <i class="fal fa-arrow-down"></i></a>
                            @endif
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
@push('head')
    <style>
        .table-striped > tbody > tr:nth-of-type(odd){
            --bs-table-accent-bg: #F9F8F9 !important;
        }
    </style>
@endpush
