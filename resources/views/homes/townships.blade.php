@extends ('layouts.master')

@section ('content')
    <section class="hero-page bg-black-3">
        <div class="container">
            <h1 class="h2">Houses in {{ $township }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li aria-current="page" class="breadcrumb-item active">{{ $township }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="new-properties bg-black-2">
        <div class="container">
            <div class="row">
                @foreach ($locations as $location)
                    <div class="col-lg-4 pb-5">
                        <div class="property">
                            <div class="image">
                                @foreach ($location->house->galleries as $image)
                                    <img src="{{ $path . '/' . $image->image_name . '.' . $image->extension }}" alt="{{ $image->image_name }}" class="img-fluid">
                                @endforeach
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <a href="/houses/{{ $location->house->id }}" class="btn btn-gradient btn-sm">View Details</a>
                                </div>
                            </div>
                            <div class="info">
                                <a href="#" class="no-anchor-style">
                                    <h3 class="h4 text-thin text-uppercase mb-1">{{ $location->house->title }}</h3>
                                </a>
                                <ul class="tags list-inline">
                                    <li class="list-inline-item">
                                        <a href="#">{{ $location->township }},</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            {{ $location->region->name }}
                                        </a>
                                    </li>
                                </ul>
                                <div class="price text-primary text-capitalize">
                                    <strong class="mr-1">${{ $location->house->price }}</strong><small>/{{ $location->house->period }}</small>
                                </div>
                            </div>
                            <div class="statistics d-flex justify-content-between text-center">
                                <div class="item">
                                    <strong class="d-block">{{ $location->house->houseDetail->bedrooms }}</strong>
                                    <span>Bedrooms</span>
                                </div>
                                <div class="item">
                                    <strong class="d-block">{{ $location->house->houseDetail->bathrooms }}</strong>
                                    <span>Baths</span>
                                </div>
                                <div class="item">
                                    <strong class="d-block">{{ $location->house->area }}</strong>
                                    <span>ft<sup>2</sup></span>
                                </div>
                            </div>
                            <div class="property-footer d-flex justify-content-between align-items-center">
                                <a href="#" class="user d-flex align-items-center no-anchor-style">
                                    <div class="avatar">
                                        <img src="{{ asset('img/default-user.png') }}" alt="{{$location->house->user->name}}" class="img-fluid">
                                    </div>
                                    <div class="text">
                                        <strong class="d-block">{{$location->house->user->name}}</strong>
                                        <span>{{ $location->house->created_at->toFormattedDateString() }}</span>
                                    </div>
                                </a>
                                <a href="/favourite/{{ $location->house->id }}" class="favourite no-anchor-style"><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section ('js')
<script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>
@endsection
