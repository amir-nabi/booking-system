@extends('welcome')
@section('user')
<style>
.container{
    margin-bottom: 200px;
}
</style>
<div class="container">
    <div class="form-group col-md-12">
        <table class="table table-bordered table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Expertise</th>
                <th scope="col">Description</th>
              </tr>
            </thead>
            <tbody>
                @foreach($doctors as $dc)
              <tr>
                <th style="vertical-align: middle;text-align: center;" scope="row"><img src="{{ Storage::url($dc->image) }}" style="width: 150px; height: 150px;"></th>
                <td>Dr. {{ $dc->name }}</td>
                <td>{{ $dc->email }}</td>
                <td>{{ $dc['expertise']['name'] }}</td>
                <td>{{ $dc->description }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
       
@endsection