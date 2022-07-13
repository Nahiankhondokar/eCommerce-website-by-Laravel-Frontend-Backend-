@extends('frontend.main_muster')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            
            @include('frontend.common.user_sidebar')

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