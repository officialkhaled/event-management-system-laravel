@extends('common.layout')
@section('title', 'Admin Dashboard')
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 mt-3 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa-solid fa-mask-ventilator"></i> Events</div>
                                    <h2>45</h2>
                                </div>
                                <canvas id="seolinechart1" height="30"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa-solid fa-people-group"></i> Completed Events</div>
                                    <h2>3,984</h2>
                                </div>
                                <canvas id="seolinechart2" height="30"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-lg-0">
                        <div class="card">
                            <div class="seo-fact sbg4">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa-solid fa-shield-halved"></i> Pending Events</div>
                                    <h2>3,984</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa-solid fa-wand-magic-sparkles"></i> Attendees</div>
                                    <h2>3,984</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <a href="{{ route('admin.events.index') }}" style="text-decoration: none; color: inherit;">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Events</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-primary">
                                        <tr class="text-white">
                                            <th width="5%">SL</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Schedule</th>
                                            <th>Location</th>
                                            <th>Status</th>
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
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-danger">No Data Found!</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
