<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserInsertController extends Controller {
   public function insertform(){
      return view('user_create');
   }

   public function insert(Request $request){

      $name = $request->input('name');
      $email = $request->input('email');
      $pass = bcrypt($request->input('pass'));


      //DB::insert('INSERT INTO users (id, name, email, password) VALUES (NULL, '?', '?', '?')',[$name],);

      //DB::insert('insert into users (id, name, email, password) values (null, ?, ?, ?)', [$name, $email, bcrypt($data['pass']]);
      
	  User::create([
            'name' => $name,
            'email' => $email,
            'password' => $pass,
        ]);
      echo "Record inserted successfully.<br/>";
      return redirect()->route('login');
   }
}
