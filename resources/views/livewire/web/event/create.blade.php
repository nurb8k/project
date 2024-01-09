<style>
    .findLocation {
        position: absolute;
        margin: auto;
        width: 15rem;
        min-height: 3rem;
        font-size: 1.2rem;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background-color: var(--shadowSaturatedTransparent);
        cursor: pointer;
        border: none;
        outline: none;
        color: var(--brighterColor);
    }
    .findLocation:hover {
        background-color: var(--shadowSaturated);
    }

    @media screen and (max-width: 550px) {
        .findLocation {
            position: absolute;
            margin: auto;
            width: 8rem;
            right: 2rem;
            min-height: 3rem;
            font-size: 1.1rem;
        }
    }
</style>
<div class="container p-4">
    <div class="col-sm-12">
        <form class="form-control" wire:submit="save" action="#" method="post" enctype="multipart/form-data">

            @csrf @method('POST')
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

                        <div class="col">
                            <label for="city">{{__('City')}}:</label>
                            <select class="form-control" wire:model="form.city_id" name="city">
                                @foreach($this->cities as $city)
                                    <option disabled value="{{ $city->id }}"
                                            @if($city->id === $form->city_id) selected @endif
                                    >{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <div>@error('form.city_id') <span class="error">{{ $message }}</span> @enderror</div>
                        </div>

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
                <div>
                    <div style=" position: relative; width: 100%;  height: 22rem; text-align: center;">
                        <button *ngIf="!readonly" class="findLocation" (click)="findMyLocation()">
                            Find My Location
                        </button>
                        <div  id="mapid"  style="width: 400px; height: 300px;"  class="map"></div>
                        <div id="search-results" class="search-results"></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary">{{__('Create')}}</button>
            </div>
        </form>
    </div>
</div>

<script>

    let geolocation = [];
    navigator.geolocation.getCurrentPosition(function(position) {

        let lat = position.coords.latitude;
        let lon = position.coords.longitude;
        geolocation.push(lat, lon);
    });

    console.log("geolocation")
    console.log(geolocation)
    setTimeout(function () {
        console.log("geolocation")
        console.log(geolocation)
        var mymap = L.map('mapid').setView(geolocation, 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);
    }, 10)




    ////////////////////////////////////////////////////////////
    // let geolocation = [];
    //
    // navigator.geolocation.getCurrentPosition(function(position) {
    //     geolocation.push(position.coords.latitude, position.coords.longitude);
    //     // geolocation.push();
    //     locationCode()
    // });
    //
    // function locationCode() {
    //     if(geolocation.length <= 0)
    //         geolocation.push(0, 0);
    // }
    //
    //
    // let map = L.map('mapid').setView(geolocation, 3);

</script>
