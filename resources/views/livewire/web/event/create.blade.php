

<div class="container p-4">
    <div class="col-sm-12">
        <form action="#" method="post" class="form-control" wire:submit="save" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row mt-2">
                        <div class="col">
                            <label for="title">{{__('Title')}}:</label>
                            <input class="form-control" wire:model="form.title" type="text">
                            <div>@error('form.title') <span class="error">{{ $message }}</span> @enderror</div>

                            <div class="mt-3">
                                <label for="capacity">{{__('Capacity')}}:</label>
                                <input class="form-control" min="1" max="30" type="number" wire:model="form.capacity"
                                       name="capacity">
                                <div>@error('form.capacity') <span class="error">{{ $message }}</span> @enderror</div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="">{{__('Short description')}}:</label>
                            <textarea class="form-control" wire:model="form.short_description" id="" cols="15"
                                      rows="4"></textarea>
                            <div>@error('form.short_description') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="description">{{__('Description')}}:</label>
                        <textarea class="form-control" wire:model="form.description" id="" cols="20"
                                  rows="6"></textarea>
                        <div>@error('form.description') <span class="error">{{ $message }}</span> @enderror</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <label for="end_time">{{__('Start time')}}</label>
                            <input class="form-control" type="date" wire:model="form.start_time" name="end_time">
                            <div>@error('form.start_time') <span class="error">{{ $message }}</span> @enderror</div>
                        </div>

                        <div class="col">
                            <label for="end_time">{{__('End time')}}</label>
                            <input class="form-control" type="date" wire:model="form.end_time" name="end_time">
                            <div>@error('form.end_time') <span class="error">{{ $message }}</span> @enderror</div>
                        </div>
                    </div>

                    <div class="row mt-2">

{{--                        <div class="col">--}}
{{--                            <label for="city">{{__('City')}}:</label>--}}
{{--                            <select class="form-control" wire:model="form.city_id" name="city">--}}
{{--                                @foreach($this->cities as $city)--}}
{{--                                    <option disabled value="{{ $city->id }}"--}}
{{--                                            @if($city->id === $form->city_id) selected @endif--}}
{{--                                    >{{ $city->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <div>@error('form.city_id') <span class="error">{{ $message }}</span> @enderror</div>--}}
{{--                        </div>--}}

                        <div class="col">
                            <label for="city">{{__('Type')}}:</label>
                            <select class="form-control" wire:model="form.type_code" name="type">
                                <option value="">{{__('Select type')}}</option>
                                @foreach($this->types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                                <div>@error('form.type_code') <span class="error">{{ $message }}</span> @enderror</div>
                            </select>
                        </div>

                        <div class="col">
                            <label for="city">{{__('Category')}}:</label>
                            <select class="form-control" name="category" wire:model="form.category_id">
                                <option value="">{{__('Select category')}}</option>
                                @foreach($this->categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                <div>@error('form.category_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mt-2">
                        <div class="col">
                            <label for="title">{{__('address')}}:</label>
                            <input id="address" class="form-control" wire:model="form.address" type="text">
                            <div>@error('form.address') <span class="error">{{ $message }}</span> @enderror</div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div style=" position: relative; width: 100%;  height: 22rem; text-align: center;">
                            <button type="button" class="findLocation" onclick="myLocation()">
                                Find My Location
                            </button>
                            <div id="mapid" style="width: 400px; height: 300px;" class="map"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button type="button" onclick="submitForm()"  class="btn btn-primary">{{__('Create')}}</button>
                <button type="submit" id="submitButton"  class="d-none">{{__('Create')}}</button>
            </div>
        </form>

    </div>
</div>

<script>
 //https://www.npmjs.com/package/leaflet-control-geocoder/v/1.8.3
    var mymap;
    mymap = L.map('mapid', {
        attributionControl: false,
    }).setView([43.25376, 76.8835584], 3.3);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    mymap.on('click', addMarker);
    var newMarker = new L.marker([43.25376, 76.8835584]);

    function addMarker(e) {
        newMarker.setLatLng(e.latlng).addTo(mymap);
        let addressLatLng = newMarker.getLatLng();
        geocodeAddress(addressLatLng);
    }

    function myLocation() {
        navigator.geolocation.getCurrentPosition(function (position) {
            let lat = position.coords.latitude;
            let lon = position.coords.longitude;
            mymap.setView([lat, lon], 16);
            newMarker.setLatLng([lat, lon]).addTo(mymap);
        });
    }

    var geocoder = L.Control.geocoder({
        defaultMarkGeocode: false
    }).on('markgeocode', function (e) {
            var bbox = e.geocode.bbox;
            var poly = L.polygon([
                bbox.getSouthEast(),
                bbox.getNorthEast(),
                bbox.getNorthWest(),
                bbox.getSouthWest()
            ]).addTo(mymap);
            mymap.fitBounds(poly.getBounds());
        }).addTo(mymap);


    function geocodeAddress(latlng) {
        if (mymap.options.crs) {

            L.Control.Geocoder.nominatim(
                {serviceUrl: 'https://nominatim.openstreetmap.org/', geocodingQueryParams: {countrycodes: 'kz'},
                    reverseQueryParams:{countrycodes: 'kz', zoom: 18, addressdetails: 1},
                    htmlTemplate: function (r) {
                        console.log(r);
                        console.log(r.address.city + ', ' + r.address.road + ', ' + r.address.house_number);
                        return r.address.city + ', ' + r.address.road + ', ' + r.address.house_number;
                    }
                }
            ).reverse(
                latlng,
                mymap.options.crs.scale(mymap.getZoom()),
                (results) => {
                    if (results && results.length > 0) {
                        const placeName = results[0].name;
                        console.log(placeName);
                        document.getElementById('address').value = placeName;
                        // Livewire.dispatchTo('web.event.create','addressUpdated', {placeName: placeName});
                        // // console.log( Livewire.find('testdata'));
                        // // Livewire.all()[0].ephemeral.form.address = placeName;
                        // console.log(Livewire.all()[0]);
                        // // Livewire.all()[0].dispatch('addressUpdated', {placeName: placeName});
                        // // console.log(Livewire.all()[0].canonical.form);
                    }
                }
            );
        }

    }
 function submitForm(){
     let address = document.getElementById('address').value;
     console.log(address)
     Livewire.dispatch('addressUpdated', {placeName:address});
     document.getElementById("submitButton").click();
 }
</script>
