<div class="container">
                        @if( $errors )
                            @foreach( $errors->all() as $error )
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                            @endforeach
                        @endif

                        
                        @if( Session::get('success') )
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
					              @endif
<div class="card " style="width: 60%; "> 
         
        <div class="card-header">
            Add todo
          </div>
       <div class="card-body">
        <form action="/user/items" method="POST" >
          @csrf
            <div class="row">
              <div class="input-field col s6">
                <input name="title" value="{{ old('title') }}" type="text"  class="form-control" placeholder="Title..">
              </div>
              <div class="input-field col s6">
                <input name="description" value="{{ old('description') }}" type="text"  class="form-control" placeholder="Description..">
              </div>
            </div>
            <button type="submit"  class="btn btn-success" style="margin-top: 5px">Save</button>
            </form> 
       </div>
</div> 
      
</div>