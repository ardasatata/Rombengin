<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();
      $admin = DB::table('users')->where('id', $id)->value('admin');
      if ($admin) {
        //return $next($request);
        Session::set('AdminCheck','true');
      }else {
        Session::set('AdminCheck','false');
        //return response('Unauthorized.', 401);
      }

            $iklans = DB::table('iklan')->where('verified', 1)->inRandomOrder()->take(5)->get();

            
        return view('welcome', ['iklans' => $iklans]);
    }
}
