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
                  <h3 class="box-title">Add Doctor</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div>
                        <form method="post" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <h5>Full Name </h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        @error('name') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <h5>Expertise</h5>
                                        <div class="controls">
                                            <select name="expertise_id" class="form-control">
                                                <option value="" selected="" disabled="">Select </option>
                                                @foreach($expertises as $exp)
                                     <option value="{{ $exp->id }}">{{ $exp->name }}</option>	
                                                @endforeach
                                            </select>
                                         </div>
                                         @error('expertise_id') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                    
                            </div>
                    </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <h5>Email</h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        @error('email') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <h5>Image </h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        @error('image') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>  
                                </div>
                            </div>        
                                    <div class="form-group">
                                        <h5>Description</h5>
                                        <div class="controls">
                                            <textarea name="description" rows="4" id="textarea" class="form-control"></textarea>     
                                        </div>
                                        @error('description') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>  
                                    <br>
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