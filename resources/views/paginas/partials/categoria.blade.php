<div class="card card-producto">
    <div class="position-relative border">
        <a href="{{ route('categoria', ['id' => $category->id]) }}" class="position-absolute mas">
            <i class="fal fa-plus"></i>
        </a>
        @if ($category->image)
            <img src="{{ asset($category->image) }}" class="card-img-top img-fluid" alt="{{$category->name}}">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-fluid" alt="{{$category->name}}">	
        @endif
    </div>
    <div class="card-body bg-white">
        <a href="{{ route('categoria', ['id' => $category->id]) }}" class="card-title text-center font-size-20 text-decoration-none text-dark d-block text-center">{{$category->name}}</a>
    </div>
</div>


