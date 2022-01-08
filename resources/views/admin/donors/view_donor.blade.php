<?php

    use Carbon\Carbon;
    use Illuminate\Support\Str;

?>

@extends('layouts.admin_layout.admin_layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DONORS DATA
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Number</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">Trustee</th>
                                            <th class="text-center">Notes</th>
                                            <th class="text-center">Created on</th>
                                            <th class="text-center">Details</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Number</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">Trustee</th>
                                            <th class="text-center">Notes</th>
                                            <th class="text-center">Created on</th>
                                            <th class="text-center">Details</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($donors as $donor)
                                            <tr>
                                                <td>{{ $donor->id }}</td>
                                                <td>
                                                    @if($donor->company != "self")
                                                        {{ ucwords($donor->company) }}
                                                    @else
                                                        Individual
                                                    @endif
                                                </td>
                                                <td>{{ ucwords($donor->name) }}</td>
                                                <td>{{ $donor->number }}</td>
                                                <td>{{ ucwords($donor->gender) }}</td>
                                                <td>{{ ucwords($donor->address) }}</td>
                                                <td>{{ ucwords(Str::replace('-', ' ', $donor->reference)) }}</td>
                                                <td>{{ $donor->notes }}</td>
                                                <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $donor->created_at)->format('d-M-Y h:i A') }}</td>
                                                <td>
                                                    @if($donor->company != "self")
                                                        <div class="button-demo js-modal-buttons">
                                                            <button type="button" data-color="indigo" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#{{ $donor->id }}">Company Details</button>
                                                        </div>
                                                        <div class="modal fade" id="{{ $donor->id }}" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="{{ $donor->id }}">{{ ucwords($donor->name) }}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                                                                        vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                                                                        Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                                                                        nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                                                                        Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="button-demo js-modal-buttons">
                                                            <button type="button" data-color="indigo" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#{{ $donor->id }}">Other Details</button>
                                                        </div>
                                                        <div class="modal fade" id="{{ $donor->id }}" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="{{ $donor->id }}">{{ ucwords($donor->name) }}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                                                                        vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                                                                        Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                                                                        nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                                                                        Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="demo-switch">
                                                        <div class="switch">
                                                            @if($donor->status == 1)
                                                                <a class="updateDonorStatus" id="donor-{{ $donor->id }}" donor_id="{{ $donor->id }}" donor_status="active" href="javascript:void(0)"><label>INACTIVE<input type="checkbox" checked ><span class="lever switch-col-indigo"></span>ACTIVE</label>
                                                                    <span id="ajaxStatus-{{ $donor->id }}" class="ajaxStatus-{{ $donor->id }}"></span>
                                                                </a>
                                                            @else
                                                                <a class="updateDonorStatus" id="donor-{{ $donor->id }}" donor_id="{{ $donor->id }}" donor_status="inactive" href="javascript:void(0)"><label>INACTIVE<input type="checkbox" ><span class="lever switch-col-indigo"></span>ACTIVE</label>
                                                                    <span id="ajaxStatus-{{ $donor->id }}" class="ajaxStatus-{{ $donor->id }}"></span>
                                                                </a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href=""><button type="button" class="btn btn-primary" style="margin-right: 10px; margin-bottom: 10px;">Update</button></a>
                                                    <a href=""><button type="button" class="btn btn-danger">Delete</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

@endsection
