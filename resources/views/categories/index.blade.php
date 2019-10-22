@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end">
    
    <a href="{{route('categories.create')}}" class="btn btn-success float-right mb-2">Add Category</a>

</div>

<div class="card card-defualt">
  
  <div class="card card-header">Category</div>

   <div class="card-body">

    @if($categories->count() > 0)
      
    <table class="table">
      
      <div class="table-header">

           <thead>

                <th>Name</th>
                <th>Post Count</th>
                <th></th>

           </thead> 

          <tbody>
            
                @foreach($categories as $category)
                
                <tr>
                
                <td>
                    {{ $category->name}}
                </td>
                <td>
                   
                   {{$category->posts->count()}}

                </td>
                <th>
                <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">
                    Edit
                    </a>
                    <button class="btn btn-danger btn-sm" onclick="handelDelete({{$category->id}})">
                    Delete
                    </button>
                
                </tr>

                @endforeach

          </tbody> 
      </div>
     
     </table>

    @else 

       <h3 class="text-center">No categories items!</h3>
    @endif

       
       <form action="" method ="POST" id="deleteCategoryForm">
       
        @method('DELETE')

        @csrf
         <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="text-center text-bold">
                       Are you sure you want to delete this category!
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
      
      
      var form = document.getElementById('deleteCategoryForm')

      form.action = '/categories/' + id


      $('#deleteModal').modal('show')

    }
  
  </script>

@endsection
