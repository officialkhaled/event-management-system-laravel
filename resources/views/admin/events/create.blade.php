@extends('common.layout')
@section('title', 'Add Events')
{{--@section('breadcrumb', 'Events')--}}
@section('content')

    <div class="main-content-inner">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">Add Events</h4>
                            <a href="{{ route('admin.events.index') }}" class="btn btn-info waves-effect bg-gradient mb-3">
                                &nbsp;<i class="fa-solid fa-angles-left"></i>&nbsp;&nbsp;Back&nbsp;
                            </a>
                        </div>

                        <form action="{{ route('admin.events.store') }}" method="post" id="event-form" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                                        <span class="text-danger title-validation"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="date" name="date" placeholder="Enter date" value="{{ date('Y-m-d') }}">
                                        <span class="text-danger date-validation"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="from_time">From Time</label>
                                        <input type="time" class="form-control" id="from_time" name="from_time"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="to_time">To Time</label>
                                        <input type="time" class="form-control" id="to_time" name="to_time"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="division_id">Division <span class="text-danger">*</span></label>
                                        <select name="division_id" id="division_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger division-validation"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="district_id">District</label>
                                        <select name="district_id" id="district_id" class="form-control select2">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="upazila_id">Upazila</label>
                                        <select name="upazila_id" id="upazila_id" class="form-control select2">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="union_id">Union</label>
                                        <select name="union_id" id="union_id" class="form-control select2">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center" style="gap: 8px;">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                        &nbsp;<i class="fa-solid fa-save"></i>&nbsp;&nbsp;Submit&nbsp;
                                    </button>
                                    <a href="{{ route('admin.events.create') }}" class="btn btn-warning text-white waves-effect waves-light">
                                        &nbsp;<i class="fa-solid fa-recycle"></i>&nbsp;&nbsp;Refresh&nbsp;
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        const division = $('#division_id');
        const district = $('#district_id');
        const upazila = $('#upazila_id');
        const union = $('#union_id');
        const date = $('#date');
        const titleValidation = $('.title-validation');
        const dateValidation = $('.date-validation');
        const divisionValidation = $('.division-validation');

        $(document).ready(function () {
            $('.select2').select2({
                allowClear: true,
            });

            $(document).on('submit', '#event-form', (event) => {
                event.preventDefault();
                if (titleValidation.val() == null) {
                    $('.title-validation').text('Title is required');
                }
                if (dateValidation.val() == null) {
                    $('.date-validation').text('Date is required');
                }
                if (divisionValidation.val() == null) {
                    $('.division-validation').text('Division is required');
                }
            });

            $(document).on('change', '#division_id', () => {
                fetchDistricts();
            });
            $(document).on('change', '#district_id', () => {
                fetchUpazilas();
            });
            $(document).on('change', '#upazila_id', () => {
                fetchUnions();
            });
        });

        function fetchDistricts() {
            let divisionId = division.val();
            if (!divisionId) {
                return;
            }
            district.empty().val('').trigger('change');
            $.ajax({
                method: 'GET',
                url: `/api/get-districts?division_id=${divisionId}`,
                success(result) {
                    $.each(result, function (key, value) {
                        district.append(`<option value="${value.id}">${value.text}</option>`);
                    })
                },
                error: function (error) {
                    console.log(error);
                }
            })
        }

        function fetchUpazilas() {
            let districtId = district.val();
            if (!districtId) {
                return;
            }
            upazila.empty().val('').trigger('change');
            $.ajax({
                method: 'GET',
                url: `/api/get-upazilas?district_id=${districtId}`,
                success(result) {
                    $.each(result, function (key, value) {
                        upazila.append(`<option value="${value.id}">${value.text}</option>`);
                    })
                },
                error: function (error) {
                    console.log(error);
                }
            })
        }

        function fetchUnions() {
            let upazilaId = upazila.val();
            if (!upazilaId) {
                return;
            }
            union.empty().val('').trigger('change');
            $.ajax({
                method: 'GET',
                url: `/api/get-unions?upazila_id=${upazilaId}`,
                success(result) {
                    $.each(result, function (key, value) {
                        union.append(`<option value="${value.id}">${value.text}</option>`);
                    })
                },
                error: function (error) {
                    console.log(error);
                }
            })
        }
    </script>

@endsection
