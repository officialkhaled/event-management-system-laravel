@extends('common.layout')
@section('title', 'Add Events')
{{--@section('breadcrumb', 'Events')--}}
@section('content')

    <div class="main-content-inner">
        <div class="row mt-3">
            <div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>* {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="1" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image_path">Image <small>(upload wide images only)</small></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image_path" id="image_path" onchange="previewImage(event)">
                                                <label class="custom-file-label" for="image_path">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center align-items-center">
                                    <div class="form-group" data-container="body" data-toggle="popover" title="Event Thumbnail" data-placement="top"
                                         data-content="">
                                        <img style="width: 780px; aspect-ratio: 16/9; object-fit: contain; border-radius: 6px; margin-top: 30px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);"
                                             src="{{ asset('assets/images/no_image.jpg') }}" id="image_preview" class="img-fluid" alt="Uploaded Image"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
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

            $(document).on('submit', '#event-form', function (e) {
                e.preventDefault();
                let isValid = true;
                $('.title-validation, .date-validation, .division-validation').text('');

                if ($('#title').val().trim() === '') {
                    $('.title-validation').text('Title is required');
                    isValid = false;
                }
                if ($('#date').val().trim() === '') {
                    $('.date-validation').text('Date is required');
                    isValid = false;
                }
                if ($('#division_id').val().trim() === '') {
                    $('.division-validation').text('Division is required');
                    isValid = false;
                }

                if (isValid) {
                    this.submit();
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
