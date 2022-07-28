@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

          <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-black">
                <h3 class="widget-user-username">{{ $profile_data -> name }}</h3>
                <h6 class="widget-user-desc">{{ $profile_data -> email }}</h6>

                <a href="{{ route('admin.profile.edit', $profile_data -> id) }}" class="btn btn-warning" style="float: right">Edit Profile</a>

              </div>
              <div class="widget-user-image">

                <img class="rounded-circle" src="{{ (!empty( $profile_data -> profile_photo_path )) ? url($profile_data -> profile_photo_path) : url('media/no_image.jpg') }}" alt="User Avatar">

              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">12K</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 br-1 bl-1">
                    <div class="description-block">
                      <h5 class="description-header">550</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">158</h5>
                      <span class="description-text">TWEETS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
          </div>

        
        </div>
    </section>
    <!-- /.content -->
  </div>

@endsection