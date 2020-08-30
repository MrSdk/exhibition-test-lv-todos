 @extends('layout' )

@section('body')


 @include('header' )
 
 <div style="padding: 10px"> 
 @include('item-create')
    <div class="container">
 <hr>
          
        <div class="list-group " > 
                    <!-- for -->
                    @foreach( $items ?? [] as $item )
                   <div class="list-group-item list-group-item-action "  >
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $item->title }} </h5>
                            <button onclick="deleteTodo( {{ $item->id }} )" type="button" class="close" >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <p class="mb-1">
                            {{ $item->description }}
                        </p>
                        <hr> <span>status: </span>

                        @if( !$item->status )
                        <span   style=" color: red"> Working.. </span>
                        <button onclick="changeStatus( {{ $item->id }} )" style="" class="btn btn-outline-success btn-sm" [disabled]="item.status">Done</button>
                        @endif

                        @if( $item->status )
                        <span   style=" color: green"> Done </span>
                        <button onclick="changeStatus( {{ $item->id }} )" style="" class="btn btn-outline-danger btn-sm" [disabled]="!item.status" >Working</button>
                        @endif
                    
                </div>
                @endforeach
                 <!-- for -->
            </div> 
  
    @if( sizeof($items ?? []) == 0 )
        <div class="row">
            <div class="m-auto"><h3  >Items are empty at the moment :(</h3></div>
        </div>
    @endif
     
    
    </div>
</div>
  
<script>
    function changeStatus( id ){
        
        let data = {};
                data._token = $("#csrf_token").val(),
                
        $.ajax({
            url: "/user/items/status/"+id,
            method: 'post',
            data: data,
            success: function( resu ){
                location.reload()
            } 
        })
    }

    
    function deleteTodo( id ){
        
        let data = {};
                data._token = $("#csrf_token").val(),
                
        $.ajax({
            url: "/user/items/"+id,
            method: 'delete',
            data: data,
            success: function( resu ){
                (resu == true) ? location.reload() : alert('Todo is not found !')
            } 
        })
    }
</script>
 
@endsection('body')