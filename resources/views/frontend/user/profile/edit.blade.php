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
                                <a href="" class="btn btn-primary btn-sm btn-block">Edit Password</a>
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
                                Profile </h3>
                            <div class="card-body">
                                <form method="post" action="{{ route('user.profile.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="info-title" for="name">Name <span> </span></label>
                                        <input id="name" type="text" name="name" class="form-control"
                                            value="{{ $user->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="email">Email <span> </span></label>
                                        <input id="email" type="email" name="email" class="form-control"
                                            value="{{ $user->email }}">
                                    </div>


                                    <div class="form-group">
                                        <label class="info-title" for="phone_number">Phone <span> </span></label>
                                        <input id="phone_number" type="text" name="phone_number" class="form-control"
                                            value="{{ $user->phone_number }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">User Image <span> </span></label>
                                        <input type="file" name="profile_photo_path" class="form-control">
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
