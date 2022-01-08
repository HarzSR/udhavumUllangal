@extends('layouts.admin_layout.admin_layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DONORS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD INDIVIDUAL DONORS
                            </h2>
                            @if(Session::has('error_message'))
                                <br>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    {{-- <strong>Oopsy!</strong> Something is wrong. Please try again. --}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Oopsy!</strong> {{ Session::get('error_message') }}.
                                </div>
                            @endif
                            @if(Session::has('success_message'))
                                <br>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Bam!</strong> {{ Session::get('success_message') }}.
                                </div>
                            @endif
                            @if($errors->any())
                                <br>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <form autocomplete="off" id="add_donor" name="add_donor" method="POST" action="{{ url('/admin/add-donor') }}" enctype="application/x-www-form-urlencoded">
                            @csrf
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-xs-3">
                                        <h2 class="card-inside-title">Full Name<span style="color: red;"> *</span></h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" autofocus required value="{{ old('name') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="card-inside-title">Number<span style="color: red;"> *</span></h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="number" name="number" placeholder="+xx xxx xxx xxxx" required value="{{ old('number') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>
                                            <b>Gender<span style="color: red;"> *</span></b>
                                        </p>
                                        <select class="form-control show-tick" id="gender" name="gender" required >--}}
                                            <option disabled @if(empty(old())) selected @endif value=""> -- Please Select -- </option>
                                            <option @if(old('gender') == "female") selected @endif value="female">Female</option>
                                            <option @if(old('gender') == "male") selected @endif value="male">Male</option>
                                            <option @if(old('gender') == "binary") selected @endif value="binary">Binary</option>
                                            <option @if(old('gender') == "prefer-not-to-say") selected @endif value="prefer-not-to-say">Prefer Not to Say</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="card-inside-title">DOB</h2>
                                        <div class="form-group">
                                            <div class="form-line" id="bs_datepicker_container">
                                                <input type="text" class="form-control" id="dob" name="dob" placeholder="DD / MM / YYYY" value="{{ old('dob') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-xs-4">
                                        <h2 class="card-inside-title">Email</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <h2 class="card-inside-title">Full Address</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" pattern="[a-zA-Z0-9\&,.-]{6,512}" value="{{ old('address') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-xs-3">
                                        <p>
                                            <b>Trustee</b><span style="color: red;"> *</span>
                                        </p>
                                        <select class="form-control show-tick" id="trustee" name="trustee" required >
                                            <option disabled @if(empty(old())) selected @endif value=""> -- Please Select -- </option>
                                            <option @if(old('trustee') == "m-sankar-mahadevan") selected @endif value="m-sankar-mahadevan">M Sankar Mahadevan</option>
                                            <option @if(old('trustee') == "m-ramesh-kumar") selected @endif value="m-ramesh-kumar">M Ramesh Kumar</option>
                                            <option @if(old('trustee') == "r-santhanam") selected @endif value="r-santhanam">R Santhanam</option>
                                            <option @if(old('trustee') == "j-premalatha") selected @endif value="j-premalatha">J Premalatha</option>
                                            <option @if(old('trustee') == "svg-subramanian") selected @endif value="svg-subramanian">SVG Subramanian</option>
                                            <option @if(old('trustee') == "others") selected @endif value="others">Others</option>
                                            <option @if(old('trustee') == "prefer-not-to-say") selected @endif value="prefer-not-to-say">Prefer Not to Say</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-9">
                                        <h2 class="card-inside-title">Additional Notes</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="notes" name="notes" placeholder="Notes" value="{{ old('notes') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-xs-6">
                                        <h2 class="card-inside-title">Status</h2>
                                        <div class="demo-switch">
                                            <div class="switch">
                                                <label>INACTIVE<input type="checkbox" id="status" name="status" @if(!empty(old('status'))) checked @endif ><span class="lever switch-col-indigo"></span>ACTIVE</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <h2 class="card-inside-title"></h2>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" style="float: right; display: inline-block;">Submit</button>
                                            <button type="reset" class="btn btn-danger" style="float: right; display: inline-block; margin-right: 15px;" onClick="window.location.reload()">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- #END# Input -->
            </div>
        </div>
    </section>

@endsection
