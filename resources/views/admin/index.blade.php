@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    @php
    $bookings = App\Models\Booking::count();
    $doctors = App\Models\Doctor::count();
    $expertises = App\Models\Expertise::count();
    @endphp
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xl-4 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">	
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-file-document-box"></i>                    
                        </div>                    
                   <div>
                    <p class="text-mute mt-20 mb-0 font-size-16">Bookings</p>
                    <h3 class="text-white mb-0 font-weight-500">{{ $bookings }}</h3>                
                    </div>
                </div>
            </div>
          </div>

          <div class="col-xl-4 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">							
                    <div class="icon bg-warning-light rounded w-60 h-60">
                        <i class="text-warning mr-0 font-size-24 mdi mdi-file-document"></i>
                    </div>
                    <div>
                    <p class="text-mute mt-20 mb-0 font-size-16">Doctors</p>
                    <h3 class="text-white mb-0 font-weight-500">{{ $doctors }}</h3>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-xl-4 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">							
                    <div class="icon bg-danger-light rounded w-60 h-60">
                        <i class="text-danger mr-0 font-size-24 mdi mdi-file"></i>
                    </div>
                    <div>
                    <p class="text-mute mt-20 mb-0 font-size-16">Expertises</p>
                    <h3 class="text-white mb-0 font-weight-500">{{ $expertises }}</h3>
                    </div>
                </div>
            </div>
          </div>
        </div>

      </section>
    <!-- /.content -->
  </div>
@endsection