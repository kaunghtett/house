@extends ('layouts.master')

@section ('content')
     <!-- Property Single Section-->
    @foreach($house_info as $house)
    <section class="property-single bg-black-2">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/property">Property</a></li>
                    <li aria-current="page" class="breadcrumb-item active">{{ $house->title }}</li>
                </ol>
            </nav>
            <header>
                <h1 class="h2 d-flex align-items-center">
                    <span class="text-uppercase">{{ $house->title }}</span>
                    <div class="badge badge-primary">For Rent</div>
                </h1>
                <p class="template-text">{{ $house->address }}</p>
            </header>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Image Slider -->
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            @foreach ($images as $image)
                                <div style="background: url({{ $path . '/' . $image->image_name . '.' . $image->extension }}); background-size: cover;" class="swiper-slide"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach ($images as $image)
                                <div style="background: url({{ $path . '/' . $image->image_name . '.' . $image->extension }}); background-size: cover;" class="swiper-slide"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- Message --}}
                <div class="col-lg-4">
                    <div class="property-single-author bg-black-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <img src="{{ asset('/img/default-user.png') }}" alt="{{ $house->user->name }}" class="img-fluid">
                            </div>
                            <div class="text">
                                <strong>{{ $house->user->name }}</strong>
                                <span>Host</span>
                                {{-- <ul class="agent-social list-inline">
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul> --}}
                            </div>
                        </div>
                        <ul class="contact-info list-inline mb-0">
                            <li class="list-inline-item"><a href="{{ $house->user->email }}"><i class="fa fa-envelope"></i>{{ $house->user->email }}</a></li>
                            <li class="list-inline-item"><a href="#"><i class="icon-smart-phone-2"></i>(+95) {{ $house->user->phone_no }}</a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-home"></i>{{ $house->user->address }}</a></li>
                        </ul>
                        <div class="agent-contact">
                            <form action="/houses/{{ $house->house_id }}/message" method="post" class="agent-contact-form">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <input type="text" name="guest_name" placeholder="Your Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="guest_email" placeholder="Your Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="guest_phone" placeholder="Your Phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <textarea name="guest_message" placeholder="Message" class="form-control radius-small"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-gradient full-width">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Details-->
            <div class="property-single-details bg-black-3 mt-5 block">
                <h3 class="h4 has-line">Property Details</h3>
                <div class="row">
                    <div class="col-lg-3">
                        <strong>Property ID</strong>
                        <span>{{ $house->house_id }}</span>
                    </div>
                    <div class="col-lg-3">
                        <strong>Type of property</strong>
                        <span>{{ $house->type_name }}</span>
                    </div>
                    {{-- <div class="col-lg-3"><strong>Property status</strong><span>For sale</span></div> --}}
                    <div class="col-lg-3">
                        <strong>Price</strong>
                        <span>{{ number_format($house->price, 3) }} MMK</span>
                    </div>
                    <div class="col-lg-3">
                        <strong>Land area</strong>
                        <span>{{ $house->area }} sqft</span>
                    </div>
                    <div class="col-lg-3">
                        <strong>Bathrooms</strong>
                        <span>{{ $house->bathrooms }}</span>
                    </div>
                    <div class="col-lg-3">
                        <strong>Bedrooms</strong>
                        <span>{{ $house->bedrooms }}</span>
                    </div>
                    <div class="col-lg-3">
                        <strong>Year built</strong>
                        <span>{{ $house->building_year }}</span>
                    </div>
                </div>
            </div>

            <!-- Property Description-->
            <div class="property-single-description bg-black-3 mt-5 block">
                <h3 class="h4 has-line">Property Description  </h3>
                <p>{{ $house->description }}</p>
            </div>

            <!-- Property Features-->
            <div class="property-single-features bg-black-3 mt-5 block">
                <h3 class="h4 has-line">Property Features</h3>
                <div class="row">
                    @foreach ($all_features as $all_feature)
                    <div class="col-lg-3">
                        <div class="label-template-checkbox {{ in_array($all_feature->name, $features) ? 'active' : '' }}">{{ $all_feature->name }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Property Map-->
            {{-- <div class="property-single-map bg-black-3 mt-5 block">
                <h3 class="h4 has-line">View on map</h3>
                <div id="property-single-map"></div>
            </div> --}}

            <!-- Property Review-->
            <div class="property-single-write-review bg-black-3 mt-5 block">
                <h3 class="h4 has-line">Review</h3>
                @if (count($reviews) < 1)
                    <p>No Reviews</p>
                @else
                    <ul class="list-group">
                        @foreach ($reviews as $review)
                            <li class="list-group-item bg-black-2 text-white">
                                <strong>
                                    <em>{{ $review->created_at->diffForHumans() }}:</em> &nbsp;
                                </strong>
                                {{ $review->body }}
                            </li>
                        @endforeach
                    </ul>
                @endif
                <hr class="line mt-5 mb-5">
                <form action="/houses/{{ $house->house_id }}/reviews" method="post">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <textarea name="body" id="body" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} radius-sm" value="{{ old('description') }} rows="5" placeholder="Your review here"></textarea>

                            {{-- error msg --}}
                            @if ($errors->has('description'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="w-100"></div>
                        <div class="col-lg-6 mt-3">
                            <button type="submit" class="btn btn-gradient">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @endforeach

    <!-- Similar Properties Section-->
    @if (count($collections) > 0)
    <section class="similar-properties bg-black-3">
        <div class="container">
            <div class="container">
                <header>
                    <h2>Similar Properties</h2>
                    <p class="template-text">Checkout out some of our listed properties</p>
                </header>
                <div class="row">
                    @foreach ($collections as $collection)
                        @foreach ($collection as $related_house)
                            <div class="col-lg-4">
                                <div class="property mb-5 mb-lg-0">
                                    <div class="image">
                                        <img src="{{ $path . '/' . $related_house->image_name . '.' . $related_house->extension }}" alt="{{ $related_house->title }}" class="img-fluid">
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                            <a href="/houses/{{ $related_house->house_id }}" class="btn btn-gradient btn-sm">View Details</a>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <a href="/houses/{{ $related_house->house_id }}" class="no-anchor-style">
                                            <h3 class="h4 text-thin text-uppercase mb-1">{{ $related_house->title }}</h3>
                                        </a>
                                        <ul class="tags list-inline">
                                            <li class="list-inline-item"><a href="/houses/{{ $related_house->house_id }}">{{ $related_house->address }}</a></li>
                                        </ul>
                                        <div class="price text-primary">
                                            <strong class="mr-1">
                                                ${{ number_format($related_house->price, 3) }}
                                            </strong>
                                            <small>/ {{$related_house->period}}</small>
                                        </div>
                                    </div>
                                    <div class="statistics d-flex justify-content-between text-center">
                                        <div class="item">
                                            <strong class="d-block">
                                                {{ $related_house->bedrooms }}
                                            </strong>
                                            <span>Bedrooms</span>
                                        </div>
                                        <div class="item">
                                            <strong class="d-block">
                                                {{ $related_house->bathrooms }}
                                            </strong>
                                            <span>Baths</span>
                                        </div>
                                        <div class="item">
                                            <strong class="d-block">
                                                {{ $related_house->area }}
                                            </strong>
                                            <span>ft<sup>2</sup></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- clients section -->
    {{-- @include ('homes.home.clients') --}}

@endsection

@section ('js')

    <script src="{{ asset('/js/swiper-thumbs.js') }}"></script>

@endsection
