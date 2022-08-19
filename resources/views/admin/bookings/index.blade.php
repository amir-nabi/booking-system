@extends('admin.admin_master')
@section('admin')
<div class="container-full">
     

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bookings List <span class="badge badge-pill badge-dark">Total : {{ count($bookings) }}  </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table style="vertical-align: middle;text-align: center;" id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date & Time</th>
                            <th>Doctor (Expertise)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($bookings as $bk)
                      <tr>
                          <td>{{ $bk->id }}</td>
                          <td>{{ $bk->name }}</td>
                          <td>{{ $bk->email }}</td>
                          <td>{{ $bk->phone }}</td>
                          <td>{{ \Carbon\Carbon::parse($bk->datetime)->format("l jS \of F Y")}} at {{ \Carbon\Carbon::parse($bk->datetime)->format("h:i:s A")}}
                          </td>
                          <td>{{ $bk['doctor']['name'] ?? '' }} ({{ $bk['expertise']['name'] ?? ''}})</td>

                          <td>
                            <form method="POST" action="{{ route('bookings.destroy',$bk->id) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('bookings.edit',$bk->id) }}" title="Edit" class="btn btn-warning btn-flat mb-5"><i class="si-note si"></i></a>
                                <button class="btn btn-danger btn-flat mb-5" type="submit"><i class="ti-trash"></i></button>
                            </form>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>
@endsection