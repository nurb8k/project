<x-app-layout>

    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    <div class="overflow-hidden ">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="pb-1 mb-4">{{__('events')}}</h5>


            <div class="row mb-5">
                <a href="#" class="col-md-12 col-xl-12">
                    <div class="card mb-3">
                        <img class="card-img-top" src="../assets/img/elements/18.jpg" alt="Card image cap"/>
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
                            <p class="card-text">
                                <small class="text-muted">
                                    {{date('d-m-Y', strtotime($event->start_time))}}
                                </small>
                            </p>
                            <div class="card-text">

                                <a href="', $event->id)}}"
                                   class="btn btn-primary">{{__('edit')}}</a>
                                <button class="btn btn-primary">
                                    {{__('subscribe')}}
                                </button>
                                <button wire:click="$dispatch('modals.event.subscribe', 'show', { id: {{ 1 }} })">
                                    EditPost
                                </button>
                                <button x-data="{}"
                                        x-on:click="window.livewire.dispatchTo('modals.event.subscribe', 'show', '{}')"
                                        class="button button-gray text-xs mt-2">View Transactions</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    {{--        </div>--}}
    {{--    </div>--}}
</x-app-layout>
