@extends('welcome')
@section('user')
@php
use App\Models\Expertise;
use App\Models\Doctor;
use Carbon\Carbon;
        $expertises = Expertise::all();
        $doctors = Doctor::all();
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeeks(2);
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
  form{
    margin-bottom: 130px;
  }
</style>
<div class="container">
  <div class="col-md-9">
    <div class="form-row">
      <div class="form-group col-md-12">
        <h1><strong> Get an Appointment NOW !</strong></h1>
      </div>
    </div>
    <form method="post" action="{{ route('bookings.add') }}">
      @csrf
        
          @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          <strong>Congratulations! </strong>{{ session()->get('success') }}
        </div>
        @endif
        @if (session()->has('warning'))
        <div class="alert alert-warning" role="alert">
          {{ session()->get('warning') }}
        </div>
        @endif
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4"><strong>Full Name</strong></label>
            <input type="text" class="form-control" name="name" placeholder="First name & Last name">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4"><strong>E-mail</strong></label>
            <input type="email" class="form-control" name="email" placeholder="Eg. username@gmail.com">
            @error('email') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress"><strong>Phone</strong></label>
          <input type="tel" class="form-control" name="phone" placeholder="Eg. +(40) 777 333 222">
          @error('phone') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
          <label for="inputAddress2"><strong>Date & Time</strong></label>
          <input type="datetime-local" class="form-control" name="datetime" min="{{ $min_date->format('Y-m-d\TH:i:s') }}" max="{{ $max_date->format('Y-m-d\TH:i:s') }}">
          @error('datetime') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity"><strong>Department</strong></label>
            <select name="expertise_id" class="form-control">
              <option value="" selected="" disabled="">Choose... </option>
                @foreach($expertises as $exp)
                <option value="{{ $exp->id }}">{{ $exp->name }}</option>	
                @endforeach
              </select>     
              @error('expertise_id') 
            <span class="text-danger">{{ $message }}</span>
            @enderror                 
          </div>
          <div class="form-group col-md-6">
            <label for="inputState"><strong>Doctor</strong></label>
              <select name="admin_id" class="form-control">
                <option value="" selected="" disabled="">Choose... </option>
                @foreach($doctors as $dc)
                <option value="{{ $dc->id ?? '' }}">{{ $dc->name }}</option>	
                @endforeach
            </select>
            @error('admin_id') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <br>
        <button style="float: right" type="submit" class="btn btn-success">Sign Up</button>
      </form>
  </div>
  </div>
  
  

            	<!-- Show doctors of each department -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('select[name="expertise_id"]').on('change', function(){
          var expertise_id = $(this).val();
          if(expertise_id) {
              $.ajax({
                  url: "{{  url('/ajax') }}/"+expertise_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="admin_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="admin_id"]').append('<option value="'+ value.id +'">' +'Dr. ' + value.name + '</option>');
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