@extends('welcome')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3>Edit User Userrmation</h3>
    </div>
  </div>
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>
          {{ $error }}
        </li>
        @endforeach

      </ul>
    </div>
  @endif

  <form  action="{{route('user.update', $User->id )}} " method="post">
{!! csrf_field() !!}
{!! method_field('put') !!}

    <div class="row">
      <div class="col-md-12">
        <strong>User Name :</strong>
        <input type="text" name="name" class="form-control" value="{{ $User->name }}">
      </div>
      <div class="col-md-12">
        <strong>User phone :</strong>
        <input type="text" name="phone" class="form-control" value="{{ $User->phone }}">
      </div>
      <div class="col-md-12">
        <strong>User password :</strong>
        <input type="text" name="password" class="form-control" value="{{ $User->password }}">
      </div>
      <div class="col-md-12">
        <strong>User Email :</strong>

        <input type="text" name="email" class="form-control" value="{{ $User->email }}">
      </div>
      <div class="col-md-12">
        <a href="{{ route('user.index') }}" class="btn btn-sm btn-success">Back</a>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
@endsection
