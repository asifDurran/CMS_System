@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end">
    
    <a href="{{route('tags.create')}}" class="btn btn-success float-right mb-2">Add Tag</a>

</div>

<div class="card card-defualt">
  
  <div class="card card-header">Tag</div>

   <div class="card-body">

    @if($tags->count() > 0)
      
    <table class="table">
      
      <div class="table-header">

           <thead>

                <th>Name</th>
                <th>Post Count</th>
                <th></th>

           </thead> 

          <tbody>
            
                @foreach($tags as $tag)
                
                <tr>
                
                <td>
                    {{ $tag->name}}
                </td>
                <td>
                   
                   {{$tag->posts->count()}}
                   
                </td>
                <th>
                <a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-info btn-sm">
                    Edit
                    </a>
                    <button class="btn btn-danger btn-sm" onclick="handelDelete({{$tag->id}})">
                    Delete
                    </button>
                
                </tr>

                @endforeach

          </tbody> 
      </div>
     
     </table>

    @else 

       <h3 class="text-center">No tags items!</h3>
    @endif

       
       <form action="" method ="POST" id="deleteTagForm">
       
        @method('DELETE')

        @csrf
         <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="text-center text-bold">
                       Are you sure you want to delete this Tag!
                      </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                    </div>
                </div>
            </div>
       
       
       </form>
         
   </div>
 </div>
@endsection

@section('scripts')

  <script>
   
    function handelDelete(id)
    {
      
      
      var form = document.getElementById('deleteTagForm')

      form.action = '/tags/' + id


      $('#deleteModal').modal('show')

    }
  
  </script>

@endsection
