@extends('welcome')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')


<div class="container">
   <div class="row">
     <div class="col-md-10">
       <h3>List Of Users Information</h3>

       </div>
     <div class="col-sm-2">
       <a class="btn btn-sm btn-success" href="{{route('user.create')}}">Create New User</a>

     </div>
   </div>


   @if($message = Session::get('success'))
     <div class="alert alert-success">
       <p>{{$message}}</p>
     </div>
   @endif

   <table class ="table table-hover table-sm">
     <tr>
         <th width=50px> <b>No.</b>  </th>
         <th width=300px> User Name  </th>
         <th>User Email</th>
         <th>User Phone</th>
         <th width=180px> Action  </th>


     </tr>
     @foreach ($Users as $user)
      <td> <b> {{ ++$i }} </b> </td>
      <td> {{ $user->name }} </td>
      <td> {{ $user->email }} </td>
      <td> {{ $user->phone }} </td>
      <td>
          <form action=" {{ route('user.destroy',$user->id) }} " method="post">
              <a class="btn btn-sm btn-primary" href=" {{ route('user.show',$user->id) }} "> Show </a>
              <a class="btn btn-sm btn-warning" href=" {{ route('user.edit',$user->id) }} "> Edit </a>


              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
              {!! csrf_field() !!}
              {!! method_field('delete') !!}
          </form>
          <tr>
      </td>

     @endforeach
   </table>
 {!! $Users->links() !!}
</div>

@endsection
 <script src="{{ asset('js/app.js') }}"></script>