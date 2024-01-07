<div class="container p-4">
    <div class="col-sm-12">
        <form class="form-control" wire:submit="save" action="#" method="post" enctype="multipart/form-data">

            @csrf @method('POST')

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
                    <div>@error('form.short_description') <span class="error">{{ $message }}</span> @enderror</div>
                </div>
            </div>


            <div class="mt-2">
                <label for="description">{{__('Description')}}:</label>
                <textarea class="form-control" wire:model="form.description" id="" cols="20" rows="6"></textarea>
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
                            <option disabled value="{{ $city->id }}" @if($city->id === $form->city_id) selected @endif
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
                            <option value="{{ $type->code }}">{{ $type->name }}</option>
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
                        <div>@error('form.category_id') <span class="error">{{ $message }}</span> @enderror</div>
                    </select>
                </div>

            </div>


            <div class="mt-2">
                <button class="btn btn-primary">{{__('Create')}}</button>
            </div>
        </form>
    </div>
</div>
