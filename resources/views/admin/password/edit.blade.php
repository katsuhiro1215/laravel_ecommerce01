@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-lg-4 col-xl-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Admin Password Edit</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="POST" action="{{ route('admin.password.update') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Current Password') }}<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="current_password" type="password" name="oldpassword"
                                                            class="form-control" required=""
                                                            autocomplete="current-password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('New Password') }}<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="password" type="password" name="password"
                                                            class="form-control" required="" autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Confirm Password') }}<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                                            class="form-control" required="" autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-primary mb-5">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
