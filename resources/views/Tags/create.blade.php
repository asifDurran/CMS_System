@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end">
<a href="{{route('tags.create')}}" class="btn btn-success float-right mb-2">Add Tag</a>
</div>

<div class="card card-defualt">
  
  <div class="card card-header">
   
   {{ isset($tag) ? 'Edit Tag' : 'Create Tag'}}
  </div>

   <div class="card-body">
      @include('partial.errors')
      
      <form action="{{isset($tag) ? route('tags.update',$tag->id) : route('tags.store')}} " method="POST">
        @csrf

        @if(isset($tag))

         @method('PUT')

        @endif
      <div class="form-group">
        <label for="">Name</label>
       <input type="text" class="form-control" id="name" name="name" value="{{isset($tag) ? $tag->name :''}}">
       
      </div>

      <div class="form-group">
       <button class="btn btn-success">
         
         {{isset($tag) ? 'Update Tag ' : 'Add Tag'}}

       </button>
      </div>     

      </form>

   </div>

 </div>
@endsection
