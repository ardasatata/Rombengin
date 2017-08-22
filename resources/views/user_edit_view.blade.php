@extends('layouts.app')
   <head>
      <title>View Users Records</title>
   </head>
@section('content')
     <body>
     <div id="mainEdit" style="max-width: 700px; margin: auto;">
     <a href = "/admin"> Click Here</a> to go back
      <table border="1" class="table table-bordered">
         <tr>
           <td>ID</td>
           <td>Name</td>
           <td>e-mail</td>
            <td>Edit</td>
         </tr>
         @foreach ($users as $user)
         <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><a href = 'edit/{{ $user->id }}'>Edit</a></td>
            <td><a href = '{{ route('profile.index',['id' => $user->id ]) }}'>profile</a></td>
         </tr>
         @endforeach
      </table>
      </div>

   </body>
@endsection