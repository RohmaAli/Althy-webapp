@extends('layouts.loginlayout')

@section('content')
<div class="card">
   <div class="card-body">
      <h3 class="text-center m-0"><a href="index.html" class="logo logo-admin"><img src="{{URL::asset('assets/images/logo.png')}}" height="300" alt="logo"></a></h3>
      <div class="p-3">
         <p class="text-muted text-center">Sign in to continue to Althy Admin Portal.</p>
         <form class="form-horizontal m-t-30" method="post" action="{{route('login')}}">
            <div class="form-group"><label for="username">Username</label> <input type="text" class="form-control" name="email" id="username" placeholder="Enter username"></div>
            <div class="form-group"><label for="userpassword">Password</label> <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password"></div>
            <div class="form-group row m-t-20">
               @if ($errors->any())
               <div class="form-group row">
                   <div class="alert alert-danger">{{$errors->first()}}</div>
               </div>
               @endif
               <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button></div>
            </div>
         </form>
      </div>
   </div>
@endsection
