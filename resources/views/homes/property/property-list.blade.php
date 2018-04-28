@extends ('homes.property.master')

@section ('heading')
    <h1 class="h2">Property List Sidebar</h1>
@endsection

@section ('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/property">Property</a></li>
            <li aria-current="page" class="breadcrumb-item active">Property List Sidebar</li>
        </ol>
    </nav>
@endsection

@section ('listings')
    <!-- Property Listings-->
          <div class="property-listing col-lg-8">
            <div class="row">
              <div class="col-lg-12">
                <div class="property-listing-item">
                  <div class="row align-items-stretch">
                   <div class="col-lg-6 pr-lg-0">
                      <div class="image"><img src="img/property-listing-1.jpeg" alt=" The Chalet Estate" class="img-fluid">
                        <div class="price">$4800/Mo</div>
                      </div>
                    </div>
                    <div class="col-lg-6 pl-lg-0">
                      <div class="inner bg-black-2 d-flex justify-content-center flex-column pd-lg-0">
                        <div class="info">
                          <div class="badge badge-primary">For Rent</div><a href="property-single.html" class="no-anchor-style">
                            <h2 class="h3 text-thin"> The Chalet Estate</h2></a>
                          <p class="address">KT89B Hampton Court, England, United Kingdom</p>
                        </div>
                        <div class="footer d-flex align-items-center justify-content-between">
                          <div class="left">Area <span class="area">120 </span> sq/ft</div>
                          <div class="right">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item"><i class="fa fa-bed"></i>4</li>
                              <li class="list-inline-item"><i class="fa fa-bath"></i>2</li>
                              <li class="list-inline-item"><i class="fa fa-car"></i>1</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="property-listing-item">
                  <div class="row align-items-stretch">
                    <div class="col-lg-6 pr-lg-0">
                      <div class="image"><img src="img/property-listing-2.jpeg" alt="Westbourne Terrace" class="img-fluid">
                        <div class="price">$650,000</div>
                      </div>
                    </div>
                    <div class="col-lg-6 pl-lg-0">
                      <div class="inner bg-black-2 d-flex justify-content-center flex-column pd-lg-0">
                        <div class="info">
                          <div class="badge badge-danger">For Sale</div><a href="property-single.html" class="no-anchor-style">
                            <h2 class="h3 text-thin">Westbourne Terrace</h2></a>
                          <p class="address">KT89B Hampton Court, England, United Kingdom</p>
                        </div>
                        <div class="footer d-flex align-items-center justify-content-between">
                          <div class="left">Area <span class="area">120 </span> sq/ft</div>
                          <div class="right">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item"><i class="fa fa-bed"></i>4</li>
                              <li class="list-inline-item"><i class="fa fa-bath"></i>2</li>
                              <li class="list-inline-item"><i class="fa fa-car"></i>1</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="property-listing-item">
                  <div class="row align-items-stretch">
                    <div class="col-lg-6 pr-lg-0">
                      <div class="image"><img src="img/property-listing-3.jpg" alt="Sturruk Gordon" class="img-fluid">
                        <div class="price">$40,000</div>
                      </div>
                    </div>
                    <div class="col-lg-6 pl-lg-0">
                      <div class="inner bg-black-2 d-flex justify-content-center flex-column pd-lg-0">
                        <div class="info">
                          <div class="badge badge-danger">For Sale</div>
                          <div class="badge badge-warning">Hot Offer</div><a href="property-single.html" class="no-anchor-style">
                            <h2 class="h3 text-thin">Sturruk Gordon</h2></a>
                          <p class="address">KT89B Hampton Court, England, United Kingdom</p>
                        </div>
                        <div class="footer d-flex align-items-center justify-content-between">
                          <div class="left">Area <span class="area">120 </span> sq/ft</div>
                          <div class="right">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item"><i class="fa fa-bed"></i>4</li>
                              <li class="list-inline-item"><i class="fa fa-bath"></i>2</li>
                              <li class="list-inline-item"><i class="fa fa-car"></i>1</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="property-listing-item">
                  <div class="row align-items-stretch">
                    <div class="col-lg-6 pr-lg-0">
                      <div class="image"><img src="img/property-listing-4.jpg" alt=" Asset Northern Star" class="img-fluid">
                        <div class="price">$2700/Mo</div>
                      </div>
                    </div>
                    <div class="col-lg-6 pl-lg-0">
                      <div class="inner bg-black-2 d-flex justify-content-center flex-column pd-lg-0">
                        <div class="info">
                          <div class="badge badge-primary">For Rent</div>
                          <div class="badge badge-success">New</div><a href="property-single.html" class="no-anchor-style">
                            <h2 class="h3 text-thin"> Asset Northern Star</h2></a>
                          <p class="address">KT89B Hampton Court, England, United Kingdom</p>
                        </div>
                        <div class="footer d-flex align-items-center justify-content-between">
                          <div class="left">Area <span class="area">120 </span> sq/ft</div>
                          <div class="right">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item"><i class="fa fa-bed"></i>4</li>
                              <li class="list-inline-item"><i class="fa fa-bath"></i>2</li>
                              <li class="list-inline-item"><i class="fa fa-car"></i>1</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="property-listing-item">
                  <div class="row align-items-stretch">
                    <div class="col-lg-6 pr-lg-0">
                      <div class="image"><img src="img/property-listing-5.jpeg" alt=" Prospect Princeton" class="img-fluid">
                        <div class="price">$3600/Mo</div>
                      </div>
                    </div>
                    <div class="col-lg-6 pl-lg-0">
                      <div class="inner bg-black-2 d-flex justify-content-center flex-column pd-lg-0">
                        <div class="info">
                          <div class="badge badge-primary">For Rent</div>
                          <div class="badge badge-warning">Hot Offer</div><a href="property-single.html" class="no-anchor-style">
                            <h2 class="h3 text-thin"> Prospect Princeton</h2></a>
                          <p class="address">KT89B Hampton Court, England, United Kingdom</p>
                        </div>
                        <div class="footer d-flex align-items-center justify-content-between">
                          <div class="left">Area <span class="area">120 </span> sq/ft</div>
                          <div class="right">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item"><i class="fa fa-bed"></i>4</li>
                              <li class="list-inline-item"><i class="fa fa-bath"></i>2</li>
                              <li class="list-inline-item"><i class="fa fa-car"></i>1</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="property-listing-item">
                  <div class="row align-items-stretch">
                    <div class="col-lg-6 pr-lg-0">
                      <div class="image"><img src="img/property-listing-1.jpeg" alt="Valmark Orchard Square" class="img-fluid">
                        <div class="price">$177,000</div>
                      </div>
                    </div>
                    <div class="col-lg-6 pl-lg-0">
                      <div class="inner bg-black-2 d-flex justify-content-center flex-column pd-lg-0">
                        <div class="info">
                          <div class="badge badge-danger">For Sale</div>
                          <div class="badge badge-success">New</div><a href="property-single.html" class="no-anchor-style">
                            <h2 class="h3 text-thin">Valmark Orchard Square</h2></a>
                          <p class="address">KT89B Hampton Court, England, United Kingdom</p>
                        </div>
                        <div class="footer d-flex align-items-center justify-content-between">
                          <div class="left">Area <span class="area">120 </span> sq/ft</div>
                          <div class="right">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item"><i class="fa fa-bed"></i>4</li>
                              <li class="list-inline-item"><i class="fa fa-bath"></i>2</li>
                              <li class="list-inline-item"><i class="fa fa-car"></i>1</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="property-listing-footer">
              <div class="d-flex justify-content-between align-items-center">
                <div class="left mt-5">
                  <p class="mb-0">Showing  <span class="text-primary">1 </span> of  <span class="text-primary">6 </span></p>
                </div>
                <div class="right mt-5">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination m-0">
                      <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                      <li class="page-item"><a href="#" class="page-link active">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
@endsection
