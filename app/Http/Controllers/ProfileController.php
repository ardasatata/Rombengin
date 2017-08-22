<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\View;

use Image;



class ProfileController extends Controller
{
    public function profile($id){
		$users = DB::select('select * from users where id = ?',[$id]);
		$profile = DB::select('select * from profile where id = ?',[$id]);

		print_r($profile);

    	return $users;
    }

    public function test($id){

    	return view('profilePage');
    }

    // public function route(){
    // 	$id = Auth::id();
    // 	 //echo "route";
    // 	return redirect()->route('profile/{$id}');
    // }

    public function edit(Request $request,$id){
    	$name = $request->input('name');
    	$email = $request->input('email');
    	//$password = $request->input('pass');
    	$pass = bcrypt($request->input('password'));
    	$alamat = $request->input('alamat');
    	$phone = $request->input('phone');

    	DB::update('update users set name = ? , email = ? , password = ? where id = ?',[$name,$email,$pass,$id]);
    	DB::update('update profile set telephone = ? , alamat = ? where id = ?',[$phone,$alamat,$id]);
    	return redirect()->back();

    }

    public function profileEdit($id){

    	$user = User::where('id',$id)->first();
    	//$profile = DB::table('profile')->where('id', $id)->get();
    	$profile = DB::select('select * from profile where id = ?',[$id]);

    	if (!$user) {
    		abort(404);
    	}



		$data = array(
			'id'  => $user['id'],
    		'name'  => $user['name'],
    		'email' => $user['email'],
    		'phone' => $profile[0]->telephone,
    		'avatar' => $profile[0]->foto,
    		'alamat' => $profile[0]->alamat,
		);

    	//return view('profilePage');
    	//return view('profilePage', $data);
		//print_r($data);

    	return View::make('profileEdit')

				->with(compact('data'));

    }

    public function getProfile($id){

    	$user = User::where('id',$id)->first();
    	//$profile = DB::table('profile')->where('id', $id)->get();
    	$profile = DB::select('select * from profile where id = ?',[$id]);

    	if (!$user) {
    		abort(404);
    	}



		$data = array(
			'id'  => $user['id'],
    		'name'  => $user['name'],
    		'email' => $user['email'],
    		'phone' => $profile[0]->telephone,
    		'avatar' => $profile[0]->foto,
    		'alamat' => $profile[0]->alamat,
		);

    	//return view('profilePage');
    	//return view('profilePage', $data);
		//print_r($data);

    	return View::make('profilePage')

				->with(compact('data'));

    	dd($id);
    }

    public function update_avatar(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$id = Auth::id();
    		DB::update('update profile set foto = ? where id = ?',[$filename,$id]);
    	}
    	return redirect()->back();
    }
}
