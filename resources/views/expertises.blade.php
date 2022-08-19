@extends('welcome')
@section('user')
<style>
.container{
    margin-bottom: 300px;
}
</style>
<div class="container">
    <div class="form-group col-md-12">
        <table class="table table-bordered table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price per H</th>
              </tr>
            </thead>
            <tbody>
                @foreach($expertises as $exp)
              <tr>
                <th scope="row">{{ $exp->id }}</th>
                <td>{{ $exp->name }}</td>
                <td>{{ $exp->description }}</td>
                <td>{{ $exp->price }} RON</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection