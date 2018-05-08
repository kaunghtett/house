<section class="hero-section bg-black-3">
    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            @foreach ($featured_houses as $featured_house)
            <div class="swiper-slide">
                @foreach ($featured_house->galleries as $image)
                <div style="background: url('{{$path . '/' .$image->image_name . '.' . $image->extension}}');" class="hero-content has-overlay-dark">
                @endforeach
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <h1>Find your dream home</h1>
                                <p class="template-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                <a href="/houses/{{$featured_house->id}}" class="btn btn-gradient">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Add Pagination-->
        <div class="swiper-pagination"></div>
    </div>
</section>
