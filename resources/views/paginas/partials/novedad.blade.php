<a href="{{ route('novedad', ['new'=> $new]) }}" class="card card-new d-block text-decoration-none">
    <div class="position-relative border">
        @if ($new->image)
            <img src="{{ asset($new->image) }}" class="card-img-top img-fluid w-100" alt="{{$new->content_1}}">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-fluid w-100" alt="{{$new->content_1}}">	
        @endif
    </div>
    <div class="card-body bg-white text-center ">
        <strong class="text-blue-2 d-inline-block mb-2">{{ $new->content_3 }}</strong>
        <strong class="card-title font-size-20 text-dark d-block text-center">{{$new->content_1}}</strong>
    </div>
</a>