@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
            <div class="card">
                <h5 class="card-header">Table Basic</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Event</th>
                            <th>Status</th>
                            <th>priority</th>
                            <th>Author</th>
                            <th>capacity</th>
                            <th>Start/End ~ Time</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ Str::limit($event->title,20) }}</td>
                                <td><span class="badge {{$event->getStatusObject->getStatusStyle()}} me-1">{{ $event->getStatusObject->name }}</span></td>
                                <td>{{ $event->priority }}</td>
                                <td>{{ $event->user->username }}</td>
                                <td>0/{{ $event->capacity }} persons</td>
                                <td>{{ \Carbon\Carbon::parse($event->start_time)->format('d.m.y')}}/{{ \Carbon\Carbon::parse($event->end_time)->format('d.m.y')}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.events.show',$event->id)}}"><i class="bx bx-show-alt me-1"></i> Show</a>
                                            <a class="dropdown-item" href="{{route('admin.events.edit'd,$event->id)}}"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                            ><i class="bx bx-trash me-1"></i> Delete</a
                                            >
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $events->links() }}

    </div>
@endsection
