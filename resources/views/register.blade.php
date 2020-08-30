 @extends('layout' )

@section('body')

<div class="container">
  
<div style="margin-top: 5%;" class="jumbotron">
    <center><h3> Register Component </h3></center>
                
          @if( $errors )
						@foreach( $errors->all() as $error )
						<div class="alert alert-danger">
							{{ $error }}
						</div>
						@endforeach
					@endif
<form action="/auth/register" method="POST">
    @csrf
   
  <div class="form-group">
  
    <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
   
    <input name="password" value="{{ old('password') }}" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div> 
  
  <button type="submit" class="btn btn-primary">Sign up</button>
  <div class="registration">
		                If you have an account, please  
		                <a class="" href="/login">
		                    Sign in
		                </a>
 </div>
</form>
</div>
</div>
 
@endsection('body')