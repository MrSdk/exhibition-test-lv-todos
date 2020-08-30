 @extends('layout' )

@section('body')
<div class="container ">
  <div class="row justify-content-center" >

  <div style="margin-top: 5%;" class="jumbotron">
      <center><h3> Login Component </h3></center>
                  
            @if( $errors )
              @foreach( $errors->all() as $error )
              <div class="alert alert-danger">
                {{ $error }}
              </div>
              @endforeach
            @endif
  <form action="/auth/login" method="POST">
      @csrf
    <div class="form-group">
      
      <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    <div class="form-group">
     
      <input name="password" value="{{ old('password') }}" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div> 
    <button type="submit" class="btn btn-primary">Login</button>
    <div class="registration">
       Don't have an account yet?
              <a class="" href="/register">
                  Create an account
              </a>
  </div>
  </form>
  </div>
  
  </div>
</div>
 
@endsection('body')