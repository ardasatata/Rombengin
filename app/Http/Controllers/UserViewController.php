<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class UserViewController extends Controller
{
    public function index(){
      $users = DB::select('select * from users');
      return view('user_view',['users'=>$users]);
   }
}
