
@extends('layouts.web')
@section('web_content')

    <div class="container p-4">
            <div class="col-sm-6">
                <form class="form-control" action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mt-2">
                        <label for="title">Title:</label>
                        <input class="form-control" type="text" name="title">
                    </div>

                    <div class="mt-2">
                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mt-2">
                        <label for="">Short Desc:</label>
                        <input class="form-control" type="text" name="short_description">
                    </div>

                    <div class="mt-2">
                        <label for="end_time">End time</label>
                        <input class="form-control" type="date" name="end_time">
                    </div>

                    <div class="mt-2">
                        <label for="capacity">Capacity</label>
                        <input class="form-control" type="number" name="capacity">
                    </div>

                    <div class="mt-2">
                        <label for="city">City:</label>
                        <select class="form-control" name="city">
                            <option value="Almaty">Almaty</option>
                            <option value="Astana">Astana</option>
                            <option value="Shymkent">Shymkent</option>
                            <option value="Aktau">Aktau</option>
                            <option value="Aktobe">Aktobe</option>
                            <option value="Atyrau">Atyrau</option>
                            <option value="Karaganda">Karaganda</option>
                            <option value="Kokshetau">Kokshetau</option>
                            <option value="Kostanay">Kostanay</option>
                            <option value="Kyzylorda">Kyzylorda</option>
                            <option value="Pavlodar">Pavlodar</option>
                            <option value="Petropavlovsk">Petropavlovsk</option>
                            <option value="Semey">Semey</option>
                            <option value="Taldykorgan">Taldykorgan</option>
                            <option value="Taraz">Taraz</option>
                            <option value="Uralsk">Uralsk</option>
                            <option value="Ust-Kamenogorsk">Ust-Kamenogorsk</option>
                            <option value="Zhezkazgan">Zhezkazgan</option>
                        </select>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-primary">Sozdat</button>
                    </div>
                </form>
            </div>
    </div>

@endsection
