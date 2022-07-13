<div class="col-md-2">

    @php
        $profile_data = App\Models\User::find(Auth::user() -> id);
    @endphp

    <img src="{{ (!empty( $profile_data -> profile_photo_path )) ? url('media/frontend/' . $profile_data -> profile_photo_path) : url('media/no_image.jpg') }}" class="card-img-top" style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover; margin-top: 20px;"  ounded alt=""><br><br>

    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile.edit') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{ route('my.order') }}" class="btn btn-primary btn-sm btn-block">Orders</a>
        <a href="{{ route('user.password.change') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>

    
</div>