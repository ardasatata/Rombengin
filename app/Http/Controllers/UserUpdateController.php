<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class UserUpdateController extends Controller
{
  public function index(){
    $users = DB::select('select * from users');
    return view('user_edit_view',['users'=>$users]);
 }
 public function show($id) {
    $users = DB::select('select * from users where id = ?',[$id]);
    return view('user_update',['users'=>$users]);
 }
 public function edit(Request $request,$id) {
    $name = $request->input('name');
    $email = $request->input('email');
    //$password = $request->input('pass');
    $pass = bcrypt($request->input('pass'));
    DB::update('update users set name = ? , email = ? , password = ? where id = ?',[$name,$email,$pass,$id]);
    echo "Record updated successfully.<br/>";
    echo '<a href = "/edit-records">Click Here</a> to go back.';
 }
}
