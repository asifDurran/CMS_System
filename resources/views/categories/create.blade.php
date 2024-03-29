@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end">
<a href="{{route('categories.create')}}" class="btn btn-success float-right mb-2">Add Category</a>
</div>

<div class="card card-defualt">
  
  <div class="card card-header">
   
   {{ isset($category) ? 'Edit Category' : 'Create Category'}}
  </div>

   <div class="card-body">
      
       @include('partial.errors')
       
      <form action="{{isset($category) ? route('categories.update',$category->id) : route('categories.store')}} " method="POST">
        @csrf

        @if(isset($category))

         @method('PUT')

        @endif
      <div class="form-group">
        <label for="">Name</label>
       <input type="text" class="form-control" id="name" name="name" value="{{isset($category) ? $category->name :''}}">
       
      </div>

      <div class="form-group">
       <button class="btn btn-success">
         
         {{isset($category) ? 'Update Category ' : 'Add Category'}}

       </button>
      </div>     

      </form>

   </div>

 </div>
@endsection
