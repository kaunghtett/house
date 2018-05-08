@extends ('layouts.master')

@section ('content')
    <section class="hero-page bg-black-3">
        <div class="container">
            <h1 class="h2">{{ ($numOfHouses == 1) ? 'Result' : 'Results' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Search</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="bg-black-2 pb-0">
        <div class="container">
            <div class="row">
                @foreach ($results as $result)
                @if($result->house != null)
                    <div class="col-lg-4 mb-5">
                        <div class="property">
                            {{-- @foreach ($images as $image) --}}
                            <div class="image"><img src="{{$path . '/' . $result->house->galleries()->where('is_featured', 1)->first()->image_name . '.' . $result->house->galleries()->where('is_featured', 1)->first()->extension}}" alt="..." class="img-fluid">
                            {{-- @endforeach --}}
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <a href="/houses/{{$result->house->id}}" class="btn btn-gradient btn-sm">View Details</a>
                                </div>
                            </div>
                            <div class="info">
                                <a href="property-single.html" class="no-anchor-style">
                                <h3 class="h4 text-thin text-uppercase mb-1">{{ $result->house->title }}</h3></a>
                                <ul class="tags list-inline">
                                    <li class="list-inline-item">
                                        <a href="/houses/townships/{{$result->township}}">
                                            {{ $result->township}},
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="/houses/regions/{{$result->region->id}}">
                                            {{ $result->region->name }}
                                        </a>
                                    </li>
                                </ul>
                                <div class="price text-primary">
                                    <strong class="mr-1">${{ $result->house->price }}</strong>
                                </div>
                            </div>
                            <div class="statistics d-flex justify-content-between text-center">
                                <div class="item"><strong class="d-block">{{ $result->house->houseDetail->bedrooms }}</strong><span>Bedrooms</span></div>
                                <div class="item"><strong class="d-block">{{ $result->house->houseDetail->bathrooms }}</strong><span>Baths</span></div>
                                <div class="item"><strong class="d-block">{{ $result->house->area }}</strong><span>ft<sup>2</sup></span></div>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
@endsection
