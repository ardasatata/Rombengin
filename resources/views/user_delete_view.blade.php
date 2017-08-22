<html>

   <head>
      <title>View User Records</title>
   </head>

   <body>
     <a href = "/admin"> Click Here</a> to go back
      <table border = "1">
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
           <td>{{ $user->email }}</td>
            <td><a href = 'delete/{{ $user->id }}'>Delete</a></td>
         </tr>
         @endforeach
      </table>

   </body>
</html>
