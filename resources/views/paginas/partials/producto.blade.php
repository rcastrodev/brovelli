<a href="{{ route('producto', ['id' => $product->id]) }}" class="card card-producto position-relative d-block text-decoration-none ">
    <div class="position-relative border">
        <div class="position-absolute mas"><i class="fal fa-plus"></i></div>
        @if (count($product->images))
            <img src="{{ asset($product->images()->first()->image) }}" class="card-img-top img-fluid" alt="{{$product->name}}">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-fluid" alt="{{$product->name}}">	
        @endif
    </div>
    <div class="card-body bg-white text-center ">
        <strong class="text-blue-1 d-inline-block mb-1">CÓDIGO {{ $product->code }}</strong>
        <strong class="card-title font-size-18 text-dark d-block text-center" style="font-weight: 500">{{$product->name}}</strong>
    </div>
</a>

