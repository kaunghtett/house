@extends ('layouts.master')

@section ('content')
    <!-- Hero Section-->
    <section class="property-grid-sidebar bg-black-3">
        <div class="container">

            @yield ('heading')

            @yield ('breadcrumb')

            <!-- Filters-->
            <div class="filter d-flex justify-content-between align-items-center flex-wrap">
                <div class="sort d-flex align-items-center"><strong>Sort</strong>
                    <select id="propertyFilter" name="property_filter" class="selectpicker">
                        <option value="low_to_high">Price (Low to Heigh)</option>
                        <option value="high_to_low">Price (Heigh to Low)</option>
                    </select>
                </div>

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
                        <div class="widget search-widget">
                            <div class="widget-header"><strong class="has-line">Search for Properties</strong></div>
                            <form class="sidebar-search">
                                <div class="form-group">
                                    <input type="text" placeholder="Type your keyword..." class="form-control">
                                </div>
                                <div class="form-group">
                                    <select name="location" title="location" class="selectpicker">
                                        <option value="los-anglos">Los Angeles</option>
                                        <option value="san-antonio">San Antonio</option>
                                        <option value="new-orleans">New Orleans</option>
                                        <option value="victor-harbor">Victor Harbor</option>
                                        <option value="gold-cost">Gold Cost</option>
                                        <option value="murray-bridge">Murray Bridge</option>
                                        <option value="south-wales">South Wales</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="type" title="Property Type" class="selectpicker">
                                        <option value="apartments">Apartment</option>
                                        <option value="houses">Houses</option>
                                        <option value="commercial">Commercial</option>
                                        <option value="lots">Lots</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="status" title="Property Status" class="selectpicker">
                                        <option value="sale">Sale</option>
                                        <option value="rent">Rent</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="bedrooms" title="Bedrooms" class="selectpicker">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="bathrooms" title="Bathrooms" class="selectpicker">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                          <div class="form-group text-center">
                            <button type="submit" class="btn btn-gradient full-width">Search Property</button>
                          </div>
                        </form>
                      </div>
                      <div class="widget featured-widget">
                        <div class="widget-header"><strong class="has-line">Featured Properties</strong></div>
                        <div class="property-thumb d-flex align-items-center">
                          <div class="image"><img src="img/property-thumb-1.jpg" alt="..." class="img-fluid"></div>
                          <div class="text"><a href="#" class="no-anchor-style">Asset Northern Star</a>
                            <p>GTb Financial destrict, New York</p><span class="price">$140.000</span>
                          </div>
                        </div>
                        <div class="property-thumb d-flex align-items-center">
                          <div class="image"><img src="img/property-thumb-2.jpg" alt="..." class="img-fluid"></div>
                          <div class="text"><a href="#" class="no-anchor-style">Rivington Hopoken</a>
                            <p>GTb Financial destrict, New York</p><span class="price">$54.000</span>
                          </div>
                        </div>
                        <div class="property-thumb d-flex align-items-center">
                          <div class="image"><img src="img/property-thumb-3.jpg" alt="..." class="img-fluid"></div>
                          <div class="text"><a href="#" class="no-anchor-style">Prospect Princeton</a>
                            <p>GTb Financial destrict, New York</p><span class="price">$397.000</span>
                          </div>
                        </div>
                      </div>
                      <div class="widget location-widget">
                        <div class="widget-header"><strong class="has-line">Location of Properties</strong></div>
                        <div class="d-flex">
                          <ul class="list-unstyled mb-0">
                            <li><a href="#">Los Angeles</a></li>
                            <li> <a href="#">San Antonio</a></li>
                            <li> <a href="#">New Orleans</a></li>
                            <li> <a href="#">Victor Harbor</a></li>
                          </ul>
                          <ul class="list-unstyled mb-0">
                            <li><a href="#">Gold Cost</a></li>
                            <li> <a href="#">New Orleans</a></li>
                            <li> <a href="#">Murray Bridge</a></li>
                            <li> <a href="#">South Wales</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
        </div>
      </div>
    </section>
@endsection
