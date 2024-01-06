<x-app-layout>

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="pb-1 mb-4">{{__('events')}}</h5>


                    <div class="row mb-5">
                        @foreach($events as $event)

                        <a href="{{route('web.events.show', $event)}}" class="col-md-4 col-xl-4">
                            <div class="card mb-3">
                                <img class="card-img-top" src="../assets/img/elements/18.jpg" alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">{{__('status')}}: {{$event->getStatus()}}</h5>
                                    <p class="card-text">
                                        {{$event->description}}
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            {{date('d-m-Y', strtotime($event->end_time))}}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                </div>
            </div>
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
