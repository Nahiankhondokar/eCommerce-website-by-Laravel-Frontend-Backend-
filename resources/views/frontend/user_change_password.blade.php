@extends('frontend.main_muster')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ (!empty( $user_pass -> profile_photo_path )) ? url('media/frontend/' . $user_pass -> profile_photo_path) : url('media/no_image.jpg') }}" class="card-img-top" style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover; margin-top: 20px;"  ounded alt="">    
                </a><br><br>
    
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('user.password.change') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <h3 class="text-center"><span>Hello... <strong>{{ Auth::user() -> name }} </strong>Update Password</span></h3>

                <form action="{{ route('user.password.update') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="info-title">Current Password</label>
                        <input type="password" name="current_pass" class="form-control unicase-form-control text-input">
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">New Password </label>
                        <input type="password" name="new_pass" class="form-control unicase-form-control text-input">
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" name="confirm_pass" class="form-control unicase-form-control text-input">
                    </div>

                    <div class="form-group">
                        <input id="click" type="submit" value="Update" class="btn btn-info btn-block">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



@endsection