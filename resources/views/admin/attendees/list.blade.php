@extends('common.layout')
@section('title', 'Attendees')
{{--@section('breadcrumb', 'Attendees')--}}
@section('content')

    <div class="main-content-inner">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">Attendees List</h4>
                            <a href="{{ route('admin.attendees.create') }}" class="btn btn-info waves-effect bg-gradient mb-3">
                                &nbsp;<i class="fa-solid fa-plus" style="opacity: 75%;"></i>&nbsp;&nbsp;Add&nbsp;
                            </a>
                        </div>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Member Since</th>
                                        <th>Schedule</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="d-flex" style="justify-content: center; gap: 6px;">
{{--                                            <a href="{{ route('admin.attendees.edit', $attendee->id) }}" class="btn btn-success"--}}
{{--                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">--}}
{{--                                                <i class="fa-solid fa-pen-to-square" style="opacity: 75%;"></i>--}}
{{--                                            </a>--}}
{{--                                            <form action="{{ route('admin.attendees.destroy', $attendee->id) }}" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">--}}
{{--                                                    <i class="fa-solid fa-trash" style="opacity: 75%;"></i>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
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
