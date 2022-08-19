@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Doctor</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div>
                        <form method="post" action="{{ route('doctors.update',$doctors->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <h5>Full Name </h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $doctors->name }}"></div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <h5>Expertise</h5>
                                        <div class="controls">
                                            <select name="expertise_id" class="form-control">
                                                <option value="" disabled="">Select </option>
                                                @foreach($expertises as $exp)
                                                <option value="{{ $exp->id }}" {{ $exp->id == $doctors->expertise_id ? 'selected': '' }} >{{ $exp->name }}</option>	
                                                @endforeach
                                            </select>
                                         </div>
                                    </div>
                                </div>
                                    
                            </div>
                    </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <h5>Email</h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" value="{{ $doctors->email }}"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Image </h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control" value="{{ $doctors->image }}">
                                        </div>
                                    </div>    
                                </div>
                                <img src="{{ Storage::url($doctors->image) }}" class="card-img-top" style="height: 80px; width: 90px;">
                            </div>        
                                    <div class="form-group">
                                        <h5>Description</h5>
                                        <div class="controls">
                                            <textarea name="description" rows="4" id="textarea" class="form-control">{!! $doctors->description !!}</textarea>     
                                        </div>
                                    </div>    
                                                           
                                    <div class="box-footer">
                                        <a href="{{ URL::previous() }}" class="btn btn-rounded btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-rounded btn-success pull-right">D o n e</button>
                                      </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
@endsection