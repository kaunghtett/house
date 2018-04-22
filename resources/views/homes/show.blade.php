@extends ('layouts.master')

@section ('content')
     <!-- Property Single Section-->
    <section class="property-single bg-black-2">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="property.html">Property</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Property Single</li>
                </ol>
            </nav>
            <header>
                <h1 class="h2 d-flex align-items-center">
                    <span>Property Single</span>
                    <div class="badge badge-primary">For Sale</div>
                </h1>
                <p class="template-text">KT89B Hampton Court, England, United Kingdom</p>
            </header>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Image Slider -->
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <div style="background: url(img/property-listing-1.jpeg); background-size: cover;" class="swiper-slide"></div>
                            <div style="background: url(img/property-listing-2.jpeg); background-size: cover;" class="swiper-slide"></div>
                            <div style="background: url(img/property-listing-3.jpg); background-size: cover;" class="swiper-slide"></div>
                            <div style="background: url(img/property-listing-4.jpg); background-size: cover;" class="swiper-slide"></div>
                            <div style="background: url(img/property-listing-5.jpeg); background-size: cover;" class="swiper-slide"></div>
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <div style="background: url(img/property-listing-1.jpeg); background-size: cover;" class="swiper-slide"></div>
                            <div style="background: url(img/property-listing-2.jpeg); background-size: cover;" class="swiper-slide"></div>
                            <div style="background: url(img/property-listing-3.jpg); background-size: cover;" class="swiper-slide"></div>
                            <div style="background: url(img/property-listing-4.jpg); background-size: cover;" class="swiper-slide"></div>
                            <div style="background: url(img/property-listing-5.jpeg); background-size: cover;" class="swiper-slide"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="property-single-author bg-black-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <img src="img/avatar-2.jpg" alt="..." class="img-fluid">
                            </div>
                            <div class="text">
                                <strong>Nicholas Jacob</strong>
                                <span>Expert Agent</span>
                                <ul class="agent-social list-inline">
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <ul class="contact-info list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-skype"></i>Richard.Wood</a></li>
                            <li class="list-inline-item"><a href="#"><i class="icon-smart-phone-2"></i>(305) 555-4555</a></li>
                        </ul>
                        <div class="agent-contact">
                            <form action="#" class="agent-contact-form">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Your Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Your Phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Message" class="form-control radius-small"></textarea>
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
                    <div class="col-lg-3"><strong>Property ID</strong><span>20142354</span></div>
                    <div class="col-lg-3"><strong>Type of location</strong><span>Apartment</span></div>
                    <div class="col-lg-3"><strong>Property status</strong><span>For sale</span></div>
                    <div class="col-lg-3"><strong>Price</strong><span>$560,000</span></div>
                    <div class="col-lg-3"><strong>Land area</strong><span>2356 sqft</span></div>
                    <div class="col-lg-3"><strong>Bathrooms</strong><span>03</span></div>
                    <div class="col-lg-3"><strong>Bedrooms</strong><span>05</span></div>
                    <div class="col-lg-3"><strong>Year built</strong><span>2010</span></div>
                </div>
            </div>

            <!-- Property Description-->
            <div class="property-single-description bg-black-3 mt-5 block">
                <h3 class="h4 has-line">Property Description  </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. LOLUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                <p>LOLDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
            </div>

            <!-- Property Features-->
            <div class="property-single-features bg-black-3 mt-5 block">
                <h3 class="h4 has-line">Property Features</h3>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="label-template-checkbox active">Swimming pool</div>
                    </div>
                    <div class="col-lg-3">
                        <div class="label-template-checkbox">Air conditioning</div>
                    </div>
                    <div class="col-lg-3">
                        <div class="label-template-checkbox active">Fireplace</div>
                    </div>
                    <div class="col-lg-3">
                        <div class="label-template-checkbox">Garage</div>
                    </div>
                    <div class="col-lg-3">
                        <div class="label-template-checkbox active">Balcony</div>
                    </div>
                    <div class="col-lg-3">
                        <div class="label-template-checkbox active">Wifi</div>
                    </div>
                    <div class="col-lg-3">
                        <div class="label-template-checkbox">Electric Range</div>
                    </div>
                    <div class="col-lg-3">
                        <div class="label-template-checkbox active">Laundry</div>
                    </div>
                </div>
            </div>

            <!-- Floor Plan    -->
            <div class="floor-plan bg-black-3 mt-5 block">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-5">
                    <h3 class="h4 has-line mb-0">Floor Plan</h3>
                    <nav>
                        <div id="nav-tab" role="tablist" class="nav nav-tabs"><a id="nav-floor-1-tab" data-toggle="tab" href="#nav-floor-1" role="tab" aria-controls="nav-floor-1" aria-selected="true" class="nav-item nav-link active">Floor one</a><a id="nav-floor-2-tab" data-toggle="tab" href="#nav-floor-2" role="tab" aria-controls="nav-floor-2" aria-selected="false" class="nav-item nav-link">Floor two</a><a id="nav-floor-3-tab" data-toggle="tab" href="#nav-floor-3" role="tab" aria-controls="nav-floor-3" aria-selected="false" class="nav-item nav-link">Floor three</a></div>
                    </nav>
                </div>
                <div id="nav-tabContent" class="tab-content">
                    <div id="nav-floor-1" role="tabpanel" aria-labelledby="nav-floor-1-tab" class="tab-pane fade show active">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. LOLUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="image"><img src="img/floor-plan.png" alt="..." class="img-fluid d-block mx-auto"></div>
                    </div>
                    <div id="nav-floor-2" role="tabpanel" aria-labelledby="nav-floor-2-tab" class="tab-pane fade">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. LOLUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="image"><img src="img/floor-plan.png" alt="..." class="img-fluid d-block mx-auto"></div>
                    </div>
                    <div id="nav-floor-3" role="tabpanel" aria-labelledby="nav-floor-3-tab" class="tab-pane fade">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. LOLUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="image"><img src="img/floor-plan.png" alt="..." class="img-fluid d-block mx-auto"></div>
                    </div>
                </div>
            </div>

            <!-- Property Map-->
            <div class="property-single-map bg-black-3 mt-5 block">
                <h3 class="h4 has-line">View on map</h3>
                <div id="property-single-map"></div>
            </div>

            <!-- Property Video-->
            <div class="property-single-video bg-black-3 mt-5 block">
                <h3 class="h4 has-line">Video tour</h3>
                <div class="video">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/g3tB7aFoyjY?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Similar Properties Section-->
    <section class="similar-properties bg-black-3">
        <div class="container">
            <div class="container">
                <header>
                    <h2>Similar Properties</h2>
                    <p class="template-text">Checkout out some of our listed properties</p>
                </header>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="property mb-5 mb-lg-0">
                            <div class="image">
                                <img src="img/property-1.jpeg" alt="Condo with pool view" class="img-fluid">
                                <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient btn-sm">View Details</a></div>
                            </div>
                            <div class="info">
                                <a href="property-single.html" class="no-anchor-style">
                                    <h3 class="h4 text-thin text-uppercase mb-1">Condo with pool view</h3>
                                </a>
                                <ul class="tags list-inline">
                                    <li class="list-inline-item"><a href="#">Embarcadero,</a></li>
                                    <li class="list-inline-item"><a href="#">San Francisco</a></li>
                                </ul>
                                <div class="price text-primary"><strong class="mr-1">$800</strong><small>/ Month</small></div>
                            </div>
                            <div class="statistics d-flex justify-content-between text-center">
                                <div class="item"><strong class="d-block">4</strong><span>Bedrooms</span></div>
                                <div class="item"><strong class="d-block">2</strong><span>Baths</span></div>
                                <div class="item"><strong class="d-block">120</strong><span>ft<sup>2</sup></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="property mb-5 mb-lg-0">
                            <div class="image">
                                <img src="img/property-2.jpeg" alt="Condo with pool view" class="img-fluid">
                                <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient btn-sm">View Details</a></div>
                            </div>
                            <div class="info"><a href="property-single.html" class="no-anchor-style">
                                <h3 class="h4 text-thin text-uppercase mb-1">Condo with pool view</h3></a>
                                <ul class="tags list-inline">
                                    <li class="list-inline-item"><a href="#">Embarcadero,</a></li>
                                    <li class="list-inline-item"><a href="#">San Francisco</a></li>
                                </ul>
                                <div class="price text-primary"><strong class="mr-1">$800</strong><small>/ Month</small></div>
                            </div>
                            <div class="statistics d-flex justify-content-between text-center">
                                <div class="item"><strong class="d-block">4</strong><span>Bedrooms</span></div>
                                <div class="item"><strong class="d-block">2</strong><span>Baths</span></div>
                                <div class="item"><strong class="d-block">120</strong><span>ft<sup>2</sup></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="property mb-5 mb-lg-0">
                            <div class="image">
                                <img src="img/property-3.jpeg" alt="Condo with pool view" class="img-fluid">
                                <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient btn-sm">View Details</a></div>
                            </div>
                            <div class="info"><a href="property-single.html" class="no-anchor-style">
                                <h3 class="h4 text-thin text-uppercase mb-1">Condo with pool view</h3></a>
                                <ul class="tags list-inline">
                                    <li class="list-inline-item"><a href="#">Embarcadero,</a></li>
                                    <li class="list-inline-item"><a href="#">San Francisco</a></li>
                                </ul>
                                <div class="price text-primary"><strong class="mr-1">$800</strong><small>/ Month</small></div>
                            </div>
                            <div class="statistics d-flex justify-content-between text-center">
                                <div class="item"><strong class="d-block">4</strong><span>Bedrooms</span></div>
                                <div class="item"><strong class="d-block">2</strong><span>Baths</span></div>
                                <div class="item"><strong class="d-block">120</strong><span>ft<sup>2</sup></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="clients bg-black-4">
        <div class="container">
            <div class="swiper-container clients-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="client"><img src="img/logo-1.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client"><img src="img/logo-2.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client"><img src="img/logo-3.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client"><img src="img/logo-4.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client"><img src="img/logo-5.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client"><img src="img/logo-1.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client"><img src="img/logo-1.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="client"><img src="img/logo-2.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="client"><img src="img/logo-3.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="client"><img src="img/logo-4.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client"><img src="img/logo-5.svg" alt="undefined"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="client"><img src="img/logo-1.svg" alt="undefined"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section ('js')

    <script src="{{ asset('/js/swiper-thumbs.js') }}"></script>

@endsection
