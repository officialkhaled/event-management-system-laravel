@extends('common.layout')
@section('title', 'Events')
{{--@section('breadcrumb', 'Events')--}}
@section('content')

    <div class="main-content-inner">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">Events List</h4>
                            <a href="{{ route('admin.events.create') }}" class="btn btn-info waves-effect bg-gradient mb-3">
                                &nbsp;<i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add&nbsp;
                            </a>
                        </div>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Schedule</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($events as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ dateFormatter($event->date) }}</td>
                                            <td>{{ dateFormatter($event->from_time, 'h:i A') . ' - ' . dateFormatter($event->to_time, 'h:i A') }}</td>
                                            <td>{{ ($event->district?->name) . ($event->district?->name ? ', ' : '') . $event->division?->name  }}</td>
                                            <td>{{ $event->status === 1 ? 'Active' : 'Inactive' }}</td>
                                            <td class="d-flex" style="justify-content: center; gap: 6px;">
                                                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square" style="opacity: 75%;"></i></a>
                                                <a href="{{ route('admin.events.destroy', $event->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash" style="opacity: 75%;"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-danger">No Data Found!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
