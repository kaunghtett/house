<div class="widget featured-widget">
    <div class="widget-header"><strong class="has-line">Featured Properties</strong></div>
    @foreach ($featured_houses as $featured_house)
        <div class="property-thumb d-flex align-items-center">
            <div class="image">
                @foreach ($featured_house->galleries as $image)
                    <img src="{{ $path . '/thumbnails/' . $image->image_name . '.' . $image->extension }}" alt="{{ $image->image_name }}" class="img-fluid">
                @endforeach
            </div>
            <div class="text">
                <a href="/houses/{{ $featured_house->id }}" class="no-anchor-style">{{ $featured_house->title }}</a>
                <p>{{ $featured_house->location->township }}, {{ $featured_house->location->region->name }}</p>
                <span class="price">MMK {{ $featured_house->price }}</span>
            </div>
        </div>
    @endforeach
</div>
