@extends('admin.admin_master')
@section('admin')
<div class="container-full">
     

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Doctors List <span class="badge badge-pill badge-dark">Total : {{ count($doctors) }} </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table style="vertical-align: middle;text-align: center;" id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Expertise</th>
                            <th>E-mail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($doctors as $dc)
                      <tr>
                          <td>{{ $dc->id }}</td>
                          <td style="vertical-align: middle;text-align: center;"><img src="{{ Storage::url($dc->image) }}" style="width: 80%; height: 60px;"></td>
                          <td>{{ $dc->name }}</td>
                          <td>{{ $dc['expertise']['name'] }}</td>
                          <td>{{ $dc->email }}</td>

                          <td style="vertical-align: middle;text-align: center;">
                            <form method="POST" action="{{ route('doctors.destroy',$dc->id) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('doctors.edit',$dc->id) }}" title="Edit" class="btn btn-warning btn-flat mb-5"><i class="si-note si"></i></a>
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