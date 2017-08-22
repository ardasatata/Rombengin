<html>

   <head>
      <title>View User Records</title>
   </head>

   <body>
      <table border = 1>
         <tr>
            <td>ID</td>
            <td>Name</td>
            <td>e-mail</td>
            <td>password</td>
            <td>profile page</td>
         </tr>
         @foreach ($users as $user)
         <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td><a href = '{{ route('profile.index',['id' => $user->id ]) }}'>profile</a></td>
         </tr>
         @endforeach
      </table>

   </body>
</html>
