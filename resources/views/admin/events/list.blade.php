@extends('common.layout')
@section('title', 'Events')
{{--@section('breadcrumb', 'Events')--}}
@section('content')

    <div class="main-content-inner">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Events List</h4>
                        <div class="single-table datatable-primary">
                            <table id="dataTable2" class="table text-center">
                                <thead class="text-capitalize">
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>2008/11/28</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Angelica Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td>2009/10/09</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
