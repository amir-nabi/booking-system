@extends('admin.admin_master')
@section('admin')
<div class="container-full">
     

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Expertises List <span class="badge badge-pill badge-dark">Total : {{ count($expertises) }} </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table style="vertical-align: middle;text-align: center;" id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price per Hour</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($expertises as $exp)
                      <tr>
                          <td>{{ $exp->id }}</td>
                          <td>{{ $exp->name }}</td>
                          <td>{{ $exp->description }}</td>
                          <td>{{ $exp->price }} RON</td>
                          <td style="vertical-align: middle;text-align: center;">
                            <form method="POST" action="{{ route('expertises.destroy',$exp->id) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('expertises.edit',$exp->id) }}" title="Edit" class="btn btn-warning btn-flat mb-5"><i class="si-note si"></i></a>
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