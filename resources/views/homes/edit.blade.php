@extends ('layouts.master')

@section ('content')
    <section class="hero-page bg-black-3">
        <div class="container">
            <h1 class="h2">Submit New Property</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Submit Property</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Submit Section-->
    <section class="submit-property bg-black-4">
        <div class="container">
            <!-- Basic Information -->
            <h2 class="h3 mb-4">Basic Information</h2>
            <form action="/houses/{{ $house->id }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Property Title *</label>
                        <input type="text" name="title" placeholder="Perfcet House For Rent" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title', $house->title) }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    {{-- <div class="form-group col-lg-3">
                        <label>Property Status *</label>
                        <select id="searchActions" name="property_status" class="selectpicker">
                            <option value="sale">Sale</option>
                            <option value="rent">Ren</option>
                        </select>
                    </div> --}}
                    <div class="form-group col-lg-6">
                        <label>Property Type *</label>
                        <select id="types" name="house_type_id" class="selectpicker">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('house_type_id', $house_type_id) == $type->id ? 'selected' : '' }}>
                                    {{ $type->type_name }}
                                </option>
                            @endforeach
                            {{-- <option value="houses">Houses</option>
                            <option value="commercial">Commercial</option>
                            <option value="lots">Lots</option> --}}
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('house_type_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('house_type_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Rental Period *</label>
                        <select id="period" name="period" class="selectpicker">
                            <option value="month" {{ old('period' . 'ly', $house->period . 'ly') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="year" {{ old('period' . 'ly', $house->period . 'ly') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('period'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('period') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Property Price *</label>
                        <input type="text" name="price" placeholder="MMK" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }} placeholder-right" value="{{ old('price', $house->price) }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('price'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Property Area *</label>
                        <input type="text" name="area" placeholder="sqft" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }} placeholder-right" value="{{ old('area', $house->area) }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('area'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('area') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Property Room *</label>
                        <select name="rooms" class="selectpicker">
                            <option value="{{ old('rooms', $house->rooms) }}">{{ old('rooms', $house->rooms) }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="more-than-5">More than 4</option>
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('rooms'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('rooms') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Property Description *</label>
                        <textarea name="description" placeholder="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} radius-sm">{{ old('description', $house->description) }}</textarea>
                    </div>

                    {{-- error msg --}}
                    @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <hr class="line mt-5 mb-5">

                <!-- Gallery -->
                <h2 class="h3 mb-4">Gallery</h2>
                <div class="row">
                    <div class="form-group col-lg-5">
                        <label class="pl-0 mb-3">Featured Image *</label>
                        <input type="file" name="feature_image" class="form-control radius-sm" onchange="previewFile();">
                        <div class="image-preview" id="image_previous">
                            <p class="template-text">Previous A Featured Image</p>
                            @foreach ($feature_images as $feature_image)
                                <img src="{{ $path . '/' . $feature_image->image_name . '.' . $feature_image->extension }}" height="100px"  class="figure-img rounded pr-3" alt="{{ $feature_image->image_name }}">
                            @endforeach
                        </div>
                        <div id="image_preview" class="image-preview d-none">
                            <p class="template-text">No File Choosen</p>
                        </div>

                        {{-- error msg --}}
                        @if ($errors->has('feature_image'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('feature_image') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-lg-7">
                        <label class="pl-0 mb-3">All Images *</label>
                        <input type="file" id="images" onchange="previewImages();" name="images[]" class="form-control radius-sm" multiple="multiple">
                        <div class="image-preview" id="images_previous">
                            <p class="template-text">Previous Images</p>
                            @foreach ($images as $image)
                                <img src="{{ $path . '/' . $image->image_name . '.' . $image->extension }}" height="100px"  class="figure-img rounded pr-3" alt="{{ $image->image_name }}">
                            @endforeach
                        </div>
                        <div id="images_preview" class="image-preview d-none">
                            <p class="template-text">No File Choosen</p>
                        </div>

                        {{-- error msg --}}
                        @if ($errors->has('images'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('images') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <hr class="line mt-5 mb-5">

                <!-- Location -->
                <h2 class="h3 mb-4">Location</h2>
                <div class="row">
                    {{-- <div class="col-lg-12">
                        <div id="submit-property-map" class="map-holder mt-5 mb-4"></div>
                    </div> --}}
                    {{-- <div class="form-group col-lg-12">
                        <label>Google Map Address *</label>
                        <input type="text" name="google_map_address" class="form-control">
                    </div> --}}
                    <div class="form-group col-lg-12">
                        <label>Friendly Address *</label>
                        <input type="text" name="address" class="form-control{{  $errors->has('address') ? ' is_invalid' : '' }}" placeholder="No, Street, Township, Region" value="{{ old('address', $location->address) }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Street *</label>
                        <input type="text" name="street" class="form-control{{  $errors->has('street') ? ' is_invalid' : '' }}" placeholder="eg. Hledan" value="{{ old('street', $location->street) }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('street'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Township *</label>
                        <input type="text" name="township" class="form-control{{  $errors->has('township') ? ' is_invalid' : '' }}" placeholder="eg. Kamayut" value="{{ old('township', $location->township) }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('township'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('township') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Region *</label>
                        <select name="region" class="selectpicker">
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}" {{ old('region', $location->region_id) == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr class="line mt-5 mb-5">

                <!-- Detailed Information -->
                <h2 class="h3 mb-4">Detailed Information</h2>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Building Year *</label>
                        <select name="building_year" class="selectpicker">
                            <option value="{{ old('building_year', $houseDetail->building_year) }}">{{ old('building_year', $houseDetail->building_year) }}</option>
                            <option value="1990 - 1999">1990 - 1999</option>
                            <option value="1999 - 2009">1999 - 2009</option>
                            <option value="2009 - 2019">2009 - 2019</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Bathrooms *</label>
                        <select name="bathrooms" class="selectpicker">
                            <option value="{{ old('bathrooms', $houseDetail->bathrooms) }}">{{ old('bathrooms', $houseDetail->bathrooms) }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Bedrooms *</label>
                        <select name="bedrooms" class="selectpicker">
                            <option value="{{ old('bedrooms', $houseDetail->bedrooms) }}">{{ old('bedrooms', $houseDetail->bedrooms) }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    {{-- <div class="form-group col-lg-4">
                        <label>Lot Size *</label>
                        <input type="text" name="lot_size" placeholder="sqft" class="form-control placeholder-right">
                    </div> --}}
                    <div class="form-group col-lg-4">
                        <label>Parking *</label>
                        <select name="parking" class="selectpicker">
                            <option value="{{ old('parking', $houseDetail->parking) }}">{{ old('parking', $houseDetail->parking) == 1 ? 'Yes' : 'No' }}</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    {{-- <div class="form-group col-lg-4">
                        <label>Cooling *</label>
                        <input type="text" name="cooling" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Sewer *</label>
                        <input type="text" name="sewer" class="form-control">
                    </div> --}}

                    <div class="form-group col-lg-4">
                        <label>Water *</label>
                        <select name="water" class="selectpicker">
                            <option value="{{ old('water', $houseDetail->water) }}">{{ old('water', $houseDetail->water) == 1 ? 'Yes' : 'No' }}</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Exercise Room *</label>
                        <select name="exercise_room" class="selectpicker">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <hr class="line mt-5 mb-5">

                <!-- Other Features-->
                <h2 class="h3 mb-4">Other Features</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="features ml-0">
                            <div class="form group">
                                @foreach ($features as $feature)
                                    <label for="{{ $feature->name }}" class="label-template-checkbox">{{ title_case($feature->name) }}
                                        <input type="checkbox" name="features[]" value="{{ $feature->name }}" id="{{ $feature->name }}">
                                    </label>
                                @endforeach

                                {{-- error msg --}}
                                @if ($errors->has('features'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('features') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <hr class="line mt-5 mb-5"> --}}

                <!-- Floor Plan-->
                {{-- <h2 class="h3 mb-4">Plan</h2>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="upload-btn-wrapper d-block"><i class="fa fa-image d-block"></i>Upload Plan Images
                            <input type="file" name="floor_images[]" multiple="multiple">
                        </div>
                    </div>
                </div> --}}
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-gradient wide">Update Property</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section ('js')
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="{{ asset('js/submit-property-map.js')}}"></script> --}}
    <script>
        function previewFile() {
            $('#image_preview').removeClass('d-none');
            $('#image_previous').addClass('d-none');
            if($('#feature_image').length) {
                $('#feature_image').remove();
            }
            $('#image_preview > p').text("A feature image choosen");
            $('#image_preview').append("<img height='100px' id='feature_image' src='"+URL.createObjectURL(event.target.files[0])+"'>");
        }

        function previewImages() {
            $('#images_preview').removeClass('d-none');
            $('#images_previous').addClass('d-none');
            var total_file=document.getElementById("images").files.length;
            if($('.image').length) {
                $('.image').remove();
            }
            $('#images_preview > p').text(total_file + " images choosen");
            for(var i=0;i<total_file;i++) {
                $('#images_preview').append("<img height='100px' class='pr-3 image pt-3 pr-3' src='"+URL.createObjectURL(event.target.files[i])+"'>");
            }
        }
    </script>
@endsection

