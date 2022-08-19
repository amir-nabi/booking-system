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
                      <h3 class="box-title">Edit Expertise</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            <form method="post" action="{{ route('expertises.update',$expertises->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <h5>Name</h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{ $expertises->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Price per Hour</h5>
                                        <div class="controls">
                                            <input type="number" name="price" class="form-control" value="{{ $expertises->price }}">
                                        </div>
                                    </div>
                                </div>
    
                                        <div class="form-group">
                                            <h5>Description</h5>
                                            <div class="controls">
                                                <textarea name="description" rows="4" id="textarea" class="form-control">{!! $expertises->description !!}</textarea>     
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