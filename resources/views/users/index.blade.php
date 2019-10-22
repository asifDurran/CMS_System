@extends('layouts.app')


@section('content')

<div class="card card-defualt">
    <div class="card-header">Users</div>


  <div class="card-body">
    @if($users->count() > 0)

    <table class="table">
      
      <thead>
        <th>Image</th>
        <th>Title</th>
        
        <th>Email</th>
        <th></th>
      </thead>
        <tbody>
        
          @foreach($users as $user)

          <tr>
           
           <td>
            <img height="40px" width="40px" style="border-radios:50%" src="{{Gravatar::src($user->email)}}" alt="">
           </td>

           <td>
             {{$user->name}}
           </td>

           
           <td>
             {{$user->email}}
           </td>
          
            <td>
            @if(!$user->isAdmin())
             
            <form action="{{route('users.make-admin', $user->id)}}" method="POST">

               @csrf 

               <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
            
            </form>

            @endif


           </td>

           
             
             </form>
            
           
            
           
          

          </tr>


          @endforeach

        </tbody>
     
     
     </table>


    @else

      <h3 class="text-center">No User data available</h3>

    @endif


  </div>
</div>

@endsection