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
                            <h4 class="header-title">Add Events</h4>
                            <a href="{{ route('admin.events.index') }}" class="btn btn-info waves-effect bg-gradient mb-3">
                                &nbsp;<i class="fa-solid fa-angles-left"></i>&nbsp;&nbsp;Back&nbsp;
                            </a>
                        </div>

                        <form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Date</label>
                                        <input type="date" class="form-control" id="date" name="date" placeholder="Enter date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
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

@endsection
