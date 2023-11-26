
@extends('layouts.web')

@section('web_content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
              @foreach($events as $event)
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $event->title }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $event->description }}</p>
                        <p>{{ $event->date }}</p>
                        <p>{{ $event->time }}</p>
                        <p>{{ $event->getStatusObject->localized_name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
