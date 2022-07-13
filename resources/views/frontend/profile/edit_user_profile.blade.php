@extends('frontend.main_muster')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
           
            @include('frontend.common.user_sidebar')

            <div class="col-md-2"></div>
            <div class="col-md-6">
                <h3 class="text-center"><span>Hello... <strong>{{ Auth::user() -> name }} </strong>UPdate Your Profile</span></h3>

                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" value="{{ $user -> name }}" class="form-control unicase-form-control text-input">
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address </label>
                        <input type="email" name="email" value="{{ $user -> email }}" class="form-control unicase-form-control text-input">
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Phone Number</label>
                        <input type="text" name="phone" value="{{ $user -> phone }}" class="form-control unicase-form-control text-input">
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Profile Photo</label><br>
                        <img src="{{ (!empty( $user -> profile_photo_path )) ? url('media/frontend/' . $user -> profile_photo_path) : url('media/no_image.jpg') }}" alt="" id="imgShowLoad" style="max-width: 100%; height: 200px;"/><br><br>

                        <input id="imgInputLoad" type="file" name="new_file" class="form-control unicase-form-control text-input">

                        <input type="hidden" name="old_file" value="{{ $user ->  	profile_photo_path }}" class="form-control unicase-form-control text-input">
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