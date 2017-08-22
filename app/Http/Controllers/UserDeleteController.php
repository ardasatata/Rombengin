<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class UserDeleteController extends Controller
{
  public function index(){
    $users = DB::select('select * from users');
    return view('user_delete_view',['users'=>$users]);
 }
 public function destroy($id) {
    DB::delete('delete from users where id = ?',[$id]);
    echo "Record deleted successfully.<br/>";
    echo '<a href="/delete-user">Click Here</a> to go back.';
 }
}
