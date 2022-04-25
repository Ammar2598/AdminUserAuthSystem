@extends('welcome')

@section('content')


<div class="container">
   <div class="row">
     <div class="col-md-12">
       <h3>User Usermation</h3>
         <hr>
       </div>
     </div>
    <div class="row">
       <div class="col-md-12">
         <div class="form-group">
           <strong>User name :</strong> {{$User->name }}
         </div>
       </div>
       <div class="col-md-12">
         <div class="form-group">
           <strong>User address :</strong> {{$User->email }}
         </div>
         <div class="form-group">
           <strong>user phone :</strong> {{$User->phone }}
         </div>
         
       </div>
       <div class="col-md-12">
         <div class="form-group">
           <a href="{{route('user.index')}}" class="btn btn-primary"> Back</a>
         </div>
       </div>
    </div>

   </div>


@endsection
