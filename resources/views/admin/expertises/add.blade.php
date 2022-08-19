@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Expertise</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div>
                        <form method="post" action="{{ route('expertises.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <h5>Title</h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" >
                                        </div>
                                        @error('name') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h5>Price per Hour</h5>
                                    <div class="controls">
                                        <input type="number" name="price" class="form-control">
                                    </div>
                                    @error('price') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror 
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