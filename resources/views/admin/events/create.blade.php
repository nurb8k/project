@extends('layouts.admin')
@section('content')
    <div class="container p-4">
        <div class="col-sm-6">
            <form class="form-control"
                  action="{{ route('admin.events.store') }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mt-2">
                    <label for="title">Title:</label>
                    <input class="form-control"
                           type="text"
                           name="title">
                </div>

                <div class="mt-2">
                    <label for="description">Description:</label>
                    <textarea
                            class="form-control"
                            name="description"
                            id=""
                            cols="30"
                            rows="10"></textarea>
                </div>

                <div class="mt-2">
                    <label for="">Short
                        Desc:</label>
                    <input class="form-control"
                           type="text"
                           name="short_description">
                </div>

                <div class="mt-2">
                    <label for="end_time">End
                        time</label>
                    <input class="form-control"
                           type="date"
                           name="end_time">
                </div>

                <div class="mt-2">
                    <label for="capacity">Capacity</label>
                    <input class="form-control"
                           type="number"
                           name="capacity">
                </div>

                <div class="mt-2">
                    <label for="city">City:</label>
                    <select class="form-control"
                            name="city">
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>

                        @endforeach
                    </select>
                </div>

                <div class="mt-2">
                    <button class="btn btn-primary">
                        Sozdat
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
