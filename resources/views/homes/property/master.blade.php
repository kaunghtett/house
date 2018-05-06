@extends ('layouts.master')

@section ('content')
    <!-- Hero Section-->
    <section class="property-grid-sidebar bg-black-3">
        <div class="container">

            @yield ('heading')

            @yield ('breadcrumb')

            <!-- Filters-->
            <div class="filter d-flex justify-content-between align-items-center flex-wrap">

                @yield ('filter')

                <div class="view d-flex align-items-center"><strong>View</strong>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="/property" class="{{ isActiveURL('/property') }}"><i class="fa fa-th-large"></i></a></li>
                        <li class="list-inline-item"><a href="/property/list" class="{{ isActiveURL('/property/list') }}"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="row">

                <!-- Property Listings-->
                @yield ('listings')

                <div class="col-lg-4">
                    <div class="property-listing-sidebar">

                        @include ('homes.property.search-widget')

                        @include ('homes.property.featured-widget')

                        @include ('homes.property.location-widget')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
