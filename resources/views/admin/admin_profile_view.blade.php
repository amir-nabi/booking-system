@extends('admin.admin_master')

@section('admin')
    
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-widget widget-user" >
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center; padding-bottom:20px;">
                    <a href="{{ route('admin.profile.edit') }}" style="float: right" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                  <h3 class="widget-user-username">Admin Profile <img style="height: 25px; width:25px" src="{{ url('upload/admin_images/verified.png') }}"></h3>
                  <br>
                  <h5 class="widget-user-desc">Name : {{ $adminData->name }}</h5>
                  <h5 class="widget-user-desc">Email : {{ $adminData->email }}</h5>
                </div>
                <div class="widget-user-image">
                  <img  src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no-image.png') }}">
                </div>
                
                  <!-- /.row -->
                </div>
              </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

  @endsection