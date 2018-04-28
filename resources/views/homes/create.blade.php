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
            <form action="{{ url('/houses') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Property Title *</label>
                        <input type="text" name="title" placeholder="Perfcet House For Rent" class="form-control" value="{{ old('title') }}" required autofocus>

                        {{-- error msg --}}
                        @if ($errors->has('title'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('title') }}
                            </div>
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
                            @if (old('region'))
                            <option value="{{ old('house_type_id') }}">{{ old('house_type_id') }}</option>
                            @endif
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                            @endforeach
                            {{-- <option value="houses">Houses</option>
                            <option value="commercial">Commercial</option>
                            <option value="lots">Lots</option> --}}
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('house_type_id'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('house_type_id') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Rental Period *</label>
                        <select id="period" name="period" class="selectpicker">
                            <option value="month" {{ old('period') == 'month' ? 'selected' : '' }}>Monthly</option>
                            <option value="year" {{ old('period') == 'year' ? 'selected' : '' }}>Yearly</option>
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('period'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('period') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Property Price *</label>
                        <input type="text" name="price" placeholder="MMK" class="form-control placeholder-right" value="{{ old('price') }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('price'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Property Area *</label>
                        <input type="text" name="area" placeholder="sqft" class="form-control placeholder-right" value="{{ old('area') }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('area'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('area') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Property Room *</label>
                        <select name="rooms" class="selectpicker">
                            @if (old('rooms'))
                            <option value="{{ old('rooms') }}">{{ old('rooms') }}</option>
                            @endif
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="more-than-5">More than 4</option>
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('rooms'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('rooms') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Property Description *</label>
                        <textarea name="description" placeholder="description" class="form-control radius-sm" value="{{ old('description') }}"></textarea>

                        {{-- error msg --}}
                        @if ($errors->has('description'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>
                </div>
                <hr class="line mt-5 mb-5">

                <!-- Gallery -->
                <h2 class="h3 mb-4">Gallery</h2>
                <div class="row">
                    <div class="form-group col-lg-5">
                        <label class="pl-0 mb-3">Featured Image *</label>
                        <input type="file" name="feature_image" class="form-control radius-sm" onchange="previewFile();">

                        {{-- error msg --}}
                        @if ($errors->has('feature_image'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('feature_image') }}
                            </div>
                        @endif
                        {{-- Preview --}}
                        <div id="image_preview" class="image-preview">
                            <p class="template-text">No File Choosen</p>
                        </div>
                    </div>

                    <div class="form-group col-lg-7">
                        <label class="pl-0 mb-3">All Images *</label>
                        <input type="file" id="images" onchange="previewImages();" name="images[]" class="form-control radius-sm" multiple="multiple">

                        {{-- error msg --}}
                        @if ($errors->has('images'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('images') }}
                            </div>
                        @endif
                        {{-- Preview --}}
                        <div id="images_preview" class="image-preview">
                            <p class="template-text">No File Choosen</p>
                        </div>
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
                        <input type="text" name="address" class="form-control" placeholder="No, Street, Township, Region" value="{{ old('address') }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('address'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Street *</label>
                        <input type="text" name="street" class="form-control" placeholder="eg. Hledan" value="{{ old('street') }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('street'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('street') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Township *</label>
                        <input type="text" name="township" class="form-control" placeholder="eg. Kamayut" value="{{ old('twonship') }}" required>

                        {{-- error msg --}}
                        @if ($errors->has('twonship'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('twonship') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Region *</label>
                        <select name="region" class="selectpicker">
                            @if (old('region'))
                            <option value="{{ old('region') }}">{{ old('region') }}</option>
                            @endif
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('region'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('region') }}
                            </div>
                        @endif
                    </div>
                </div>
                <hr class="line mt-5 mb-5">

                <!-- Detailed Information -->
                <h2 class="h3 mb-4">Detailed Information</h2>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Building Year *</label>
                        <select name="building_year" class="selectpicker">
                            @if (old('building_year'))
                            <option value="{{ old('building_year') }}">{{ old('building_year') }}</option>
                            @endif
                            <option value="1990-1999">1990 - 1999</option>
                            <option value="1999-2009">1999 - 2009</option>
                            <option value="2009-2019">2009 - 2019</option>
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('building_year'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('building_year') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Bathrooms *</label>
                        <select name="bathrooms" class="selectpicker">
                            @if (old('bathrooms'))
                            <option value="{{ old('bathrooms') }}">{{ old('bathrooms') }}</option>
                            @endif
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('bathrooms'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('bathrooms') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Bedrooms *</label>
                        <select name="bedrooms" class="selectpicker">
                            @if (old('bedrooms'))
                            <option value="{{ old('bedrooms') }}">{{ old('bedrooms') }}</option>
                            @endif
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('bedrooms'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('bedrooms') }}
                            </div>
                        @endif
                    </div>
                    {{-- <div class="form-group col-lg-4">
                        <label>Lot Size *</label>
                        <input type="text" name="lot_size" placeholder="sqft" class="form-control placeholder-right">
                    </div> --}}
                    <div class="form-group col-lg-4">
                        <label>Parking *</label>
                        <select name="parking" class="selectpicker">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            @if (old('parking'))
                            <option value="{{ old('parking') }}">{{ old('parking') }}</option>
                            @endif
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('parking'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('parking') }}
                            </div>
                        @endif
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
                            @if (old('water'))
                            <option value="{{ old('water') }}">{{ old('water') }}</option>
                            @endif
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('water'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('water') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Exercise Room *</label>
                        <select name="exercise_room" class="selectpicker">
                            @if (old('exercise_room'))
                            <option value="{{ old('exercise_room') }}">{{ old('exercise_room') }}</option>
                            @endif
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                        {{-- error msg --}}
                        @if ($errors->has('exercise_room'))
                            <div class="text-danger font-italic">
                                {{ $errors->first('exercise_room') }}
                            </div>
                        @endif
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
                                    <div class="text-danger font-italic">
                                        {{ $errors->first('features') }}
                                    </div>
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
                        <button type="submit" class="btn btn-gradient wide">Submit Property</button>
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
            if($('#feature_image').length) {
                $('#feature_image').remove();
            }
            $('#image_preview > p').text("A feature image choosen");
            $('#image_preview').append("<img height='100px' id='feature_image' src='"+URL.createObjectURL(event.target.files[0])+"'>");
        }

        function previewImages() {
            var total_file=document.getElementById("images").files.length;
            if($('.image').length) {
                $('.image').remove();
            }
            $('#images_preview > p').text(total_file + " images choosen");
            for(var i=0;i<total_file;i++) {
                $('#images_preview').append("<img height='100px' class='pr-3 image' src='"+URL.createObjectURL(event.target.files[i])+"'>");
            }
        }
    </script>
@endsection
