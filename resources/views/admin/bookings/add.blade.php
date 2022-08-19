@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Bookings</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div>
                        <form method="post" action="{{ route('bookings.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <div class="box-body">
                                <div class="row">
                                  <div class="col-12">
                                      <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                                        <div class="col-sm-10">
                                          <input class="form-control" type="text" name="name" id="example-text-input">
                                          @error('name') 
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                        </div> 
                                      </div>
                                      <div class="form-group row">
                                          <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                          <div class="col-sm-10">
                                            <input class="form-control" type="email" name="email" id="example-text-input">
                                            @error('email') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                          </div>
                                        </div>
                                      <div class="form-group row">
                                        <label for="example-tel-input" class="col-sm-2 col-form-label">Telephone</label>
                                        <div class="col-sm-10">
                                          <input class="form-control" type="tel" name="phone" id="example-tel-input">
                                          @error('phone') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="example-tel-input" class="col-sm-2 col-form-label">Expertise</label>
                                        <div class="col-sm-10">
                                            <select name="expertise_id" class="form-control">
                                                <option value="" selected="" disabled="">Select </option>
                                                @foreach($expertises as $exp)
                                                    <option value="{{ $exp->id }}">{{ $exp->name }}</option>	
                                                @endforeach
                                            </select>
                                            @error('expertise_id') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                         </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-tel-input" class="col-sm-2 col-form-label">Doctor</label>
                                        <div class="col-sm-10">
                                            <select name="admin_id" class="form-control">
                                                <option value="" selected="" disabled="">Select </option>
                                                
                                            </select>
                                            @error('admin_id') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                         </div>
                                    </div>
                                      <div class="form-group row">
                                        <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Date and time</label>
                                        <div class="col-sm-10">
                                          <input class="form-control" type="datetime-local" name="datetime" id="example-datetime-local-input">
                                          <input class="form-control" type="hidden" name="endtime" id="example-datetime-local-input">
                                          @error('datetime') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                      </div>
                                      <br>
                                      <div class="box-footer">
                                        <a href="{{ URL::previous() }}" class="btn btn-rounded btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-rounded btn-success pull-right">D o n e</button>
                                      </div>
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
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


                	<!-- Show doctors of each department -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="expertise_id"]').on('change', function(){
            var expertise_id = $(this).val();
            if(expertise_id) {
                $.ajax({
                    url: "{{  url('/admin/bookings/ajax') }}/"+expertise_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="admin_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="admin_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>
@endsection