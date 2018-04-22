<section class="search-property bg-black-4">
    <div class="container">
        <form action="#">
            <div class="row justify-content-center">
                <div class="form-group col-xl-7 col-lg-6">
                    <input type="text" name="keyword_search" placeholder="Enter address e.g. street, city and state or zip" class="form-control">
                </div>

                <div class="form-group col-xl-1 col-lg-2">
                    <a href="#" class="more-filters btn btn-gradient full-width">
                        <i class="fa fa-sliders"></i>
                    </a>
                </div>
                <div class="form-group col-lg-2">
                    <button type="submit" class="submit btn btn-gradient full-width">Search</button>
                </div>
            </div>

            <div class="row all-options d-none">
                <div class="form-group col-lg-4">
                    <input type="text" name="min_price" placeholder="Min Price [USD]" class="form-control">
                </div>
                <div class="form-group col-lg-4">
                    <input type="text" name="max_price" placeholder="Max Price [USD]" class="form-control">
                </div>
                <div class="form-group col-lg-4">
                    <select id="Types" name="types" title="Property Type" class="selectpicker">
                        <option value="apartments">Apartments</option>
                        <option value="houses">Houses</option>
                        <option value="commercial">Commercial</option>
                        <option value="lots">Lots</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <input type="text" name="min_area_range" placeholder="Min area range [sq m]" class="form-control">
                </div>
                <div class="form-group col-lg-4">
                    <input type="text" name="max_area-range" placeholder="Max area range [sq m]" class="form-control">
                </div>
                <div class="form-group col-lg-4">
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
                <div class="form group col-lg-12">
                    <label for="air_conditioning" class="label-template-checkbox">Air Conditioning
                        <input type="checkbox" name="air_conditioning" id="air_conditioning">
                    </label>
                    <label for="alarm" class="label-template-checkbox">Alarm
                        <input type="checkbox" name="alarm" id="alarm">
                    </label>
                    <label for="central_heating" class="label-template-checkbox">Central Heating
                        <input type="checkbox" name="central_heating" id="central_heating">
                    </label>
                    <label for="gym" class="label-template-checkbox">Gym
                        <input type="checkbox" name="gym" id="gym">
                    </label>
                    <label for="internet" class="label-template-checkbox">Internet
                        <input type="checkbox" name="internet" id="internet">
                    </label>
                    <label for="laundry_room" class="label-template-checkbox">Laundry Room
                        <input type="checkbox" name="laundry_room" id="laundry_room">
                    </label>
                    <label for="swimming_pool" class="label-template-checkbox">Swimming Pool
                        <input type="checkbox" name="swimming_pool" id="swimming_pool">
                    </label>
                </div>
            </div>
        </form>
    </div>
</section>