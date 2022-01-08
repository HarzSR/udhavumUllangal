@extends('layouts.admin_layout.admin_layout')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PROFILE
                            </h2>
                            @if(Session::has('error_message'))
                                <br>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    {{-- <strong>Oopsy!</strong> Something is wrong. Please try again. --}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Oopsy!</strong> {{ ucwords(Session::get('error_message')) }}.
                                </div>
                            @endif
                            @if(Session::has('success_message'))
                                <br>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Bam!</strong> {{ ucwords(Session::get('success_message')) }}.
                                </div>
                            @endif
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ ucwords(Auth::guard('admin')->user()->name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Type</th>
                                        <td>{{ ucwords(Auth::guard('admin')->user()->type) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{ Auth::guard('admin')->user()->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ strtolower(Auth::guard('admin')->user()->email) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                            <div class="image">
                                                <img src="@if(!empty(Auth::guard('admin')->user()->image)) {{ asset('/images/admin_images/admin_photos/' . Auth::guard('admin')->user()->image) }} @else /images/admin_images/user.png  @endif" class="img-circle elevation-2" alt="Default Image">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td><?php echo date('d-M-Y h:i A', strtotime(Auth::guard('admin')->user()->created_at)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if(Auth::guard('admin')->user()->status == 1)
                                                <button type="button" class="btn btn-success waves-effect" style="pointer-events: none;">Active</button>
                                            @else
                                                <button type="button" class="btn btn-danger waves-effect" style="pointer-events: none;">In-Active</button>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Password Update</th>
                                        <td>
                                            <div class="col-xs-12 col-sm-6 align-left">
                                                <div class="switch panel-switch-btn">
                                                    <label>NO<input type="checkbox" name="updatePass" id="updatePass" @if($errors->any()) checked @endif><span class="lever switch-col-cyan"></span>YES</label>
                                                </div>
                                            </div>
                                            <form action="{{ url('/admin/update-pwd') }}" method="POST" id="updatePwd" name="updatePwd">
                                                @csrf
                                                    <div class="row clearfix" id="updateForm" name="updateForm" @if($errors->any()) @else style="display: none;" @endif>
                                                    <br>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="card">
                                                            <div class="body">
                                                                @if($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul>
                                                                            @foreach($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="password" name="current_pwd" id="current_pwd" class="form-control" placeholder="Current Password" value="{{ old('current_pwd') }}" />
                                                                            </div>
                                                                            <span id="currentPassword" name="currentPassword"></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="password" name="new_pwd" id="new_pwd" class="form-control" placeholder="New Password" value="{{ old('new_pwd') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="password" name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password" value="{{ old('confirm_pwd') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-success" style="float: right;" id="submitPwd" name="submitPwd">Update Password</button>
                                                                        <button type="reset" class="btn btn-danger" style="float: left;" id="updatePwdReset" name="updatePwdReset">Reset</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Bordered Table -->

        </div>
    </section>

@endsection
