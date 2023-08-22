@extends('frontend.main_master')

@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="mb-3">
                        <img class="card-img-top" style="border-radius: 50%"
                            src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/no-image.png') }}"
                            height="100%" width="100%">
                    </div>
                    <div class="mb-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-item me-3">
                                <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('user.profile.edit') }}" class="btn btn-primary btn-sm btn-block">Profile
                                    Update</a>
                            </li>
                            <li>
                                <a href="{{ route('user.password.edit') }}" class="btn btn-primary btn-sm btn-block">Edit Password</a>
                            </li>
                            <li>
                                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="card">
                            <h3 class="text-center"><span
                                    class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong> Update Your
                                Password </h3>
                            <div class="card-body">
                                <form method="post" action="{{ route('user.password.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label class="info-title" for="password">{{ __('Current Password') }} <span> </span></label>
                                        <input id="current_password" type="password" name="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="email">Email <span> </span></label>
                                        <input id="password" type="password" name="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="email">Email <span> </span></label>
                                        <input id="password" type="password" name="password" class="form-control">
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
@endsection
