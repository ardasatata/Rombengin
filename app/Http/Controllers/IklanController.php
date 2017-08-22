<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\View;

use Image;

class IklanController extends Controller
{
    
    public function viewAllIklan(){

    	$iklans = DB::table('iklan')->orderBy('id_iklan', 'desc')->paginate(10);

        return view('iklanViewAll', ['iklans' => $iklans]);
    }

        public function myIklan($id){

    	$iklans = DB::table('iklan')->where('id_penjual', $id)->paginate(5);

        return view('iklanSaya', ['iklans' => $iklans]);
    }




    public function pasang(){

    	return view('pasangIklan');
    }

    public function post(Request $request){

    	$id = Auth::id();
    	//echo "eoooeoeoeoe";

    	$judul = $request->input('judul');
      	$harga = $request->input('harga');
      	$kategori = $request->input('kategori');
      	$terjual = $request->input('terjual');
      	$konten = $request->input('konten');

      	$id_iklan = DB::table('iklan')->insertGetId(
    		['id_penjual' => $id ,
    		 'judul_iklan' => $judul , 
    		 'harga' => $harga ,
    		 'kategori_iklan' => $kategori ,
    		 'terjual' => $terjual ,
    		 'konten_iklan' => $konten ,
    		]
		);

    	if($request->hasFile('foto1')){
    		$foto1 = $request->file('foto1');
    		$filename = time() . '.' . $foto1->getClientOriginalExtension();
    		Image::make($foto1)->save( public_path('/uploads/iklan/' . $filename ) );
    		DB::update('update iklan set foto1 = ? where id_iklan = ?',[$filename,$id_iklan]);
    	}

    	if($request->hasFile('foto2')){
    		$foto2 = $request->file('foto2');
    		$filename = time() . '.' . $foto2->getClientOriginalExtension();
    		Image::make($foto2)->save( public_path('/uploads/iklan/' . $filename ) );
    		DB::update('update iklan set foto2 = ? where id_iklan = ?',[$filename,$id_iklan]);
    	}

    	if($request->hasFile('foto3')){
    		$foto3 = $request->file('foto3');
    		$filename = time() . '.' . $foto1->getClientOriginalExtension();
    		Image::make($foto3)->save( public_path('/uploads/iklan/' . $filename ) );
    		DB::update('update iklan set foto3 = ? where id_iklan = ?',[$filename,$id_iklan]);
    	}

      	echo "Iklan anda sedang di posting...";

    	return redirect()->route('iklan.index',['id' => $id_iklan ]);
    }

    public function getIklan($id_iklan){

    	$id = Auth::id();

    	
    	$iklan = DB::select('select * from iklan where id_iklan = ?',[$id_iklan]);
        $user = User::where('id',$iklan[0]->id_penjual)->first();


    	if (!$user) {
    		abort(404);
    	}

		$data = array(
			'id'  => $iklan[0]->id_penjual,
    		'name'  => $user['name'],
    		'judul' => $iklan[0]->judul_iklan,
    		'kategori' => $iklan[0]->kategori_iklan,
    		'konten' => $iklan[0]->konten_iklan,
    		'harga' => $iklan[0]->harga,
    		'terjual' => $iklan[0]->terjual,
    		'foto1' => $iklan[0]->foto1,
    		'foto2' => $iklan[0]->foto2,
    		'foto3' => $iklan[0]->foto3,
            'view_count' => $iklan[0]->view_count,
		);

    	//return view('profilePage');
    	//return view('profilePage', $data);
		//print_r($data);

        DB::table('iklan')->where('id_iklan', $id_iklan)->increment('view_count');

    	return View::make('iklanPage')

				->with(compact('data'));
    }

        public function editIklan($id){

        $id = Auth::id();

        $user = User::where('id',$id)->first();
        $iklan = DB::select('select * from iklan where id_iklan = ?',[$id]);

        if (!$user) {
            abort(404);
        }

        $data = array(
            'id'  => $user['id'],
            'name'  => $user['name'],
            'judul' => $iklan[0]->judul_iklan,
            'kategori' => $iklan[0]->kategori_iklan,
            'konten' => $iklan[0]->konten_iklan,
            'harga' => $iklan[0]->harga,
            'terjual' => $iklan[0]->terjual,
            'foto1' => $iklan[0]->foto1,
            'foto2' => $iklan[0]->foto2,
            'foto3' => $iklan[0]->foto3,

        );

    	return View::make('iklanEdit')

				->with(compact('data'));

    }

    public function editIklanPost(Request $request,$id){

        $judul = $request->input('judul');
        $harga = $request->input('harga');
        $kategori = $request->input('kategori');
        $terjual = $request->input('terjual');
        $konten = $request->input('konten');

        // $id_iklan = DB::table('iklan')->insertGetId(
        //     ['id_penjual' => $id ,
        //      'judul_iklan' => $judul , 
        //      'harga' => $harga ,
        //      'kategori_iklan' => $kategori ,
        //      'terjual' => $terjual ,
        //      'konten_iklan' => $konten ,
        //     ]
        // );

        DB::update('update iklan set judul_iklan = ? , harga = ? , kategori_iklan = ?, terjual = ?, konten_iklan = ? where id_iklan = ?',[$judul,$harga,$kategori,
            $terjual,$konten,$id]);

        if($request->hasFile('foto1')){
            $foto1 = $request->file('foto1');
            $filename = time() . '.' . $foto1->getClientOriginalExtension();
            Image::make($foto1)->save( public_path('/uploads/iklan/' . $filename ) );
            DB::update('update iklan set foto1 = ? where id_iklan = ?',[$filename,$id]);
        }

        if($request->hasFile('foto2')){
            $foto2 = $request->file('foto2');
            $filename = time() . '.' . $foto2->getClientOriginalExtension();
            Image::make($foto2)->save( public_path('/uploads/iklan/' . $filename ) );
            DB::update('update iklan set foto2 = ? where id_iklan = ?',[$filename,$id]);
        }

        if($request->hasFile('foto3')){
            $foto3 = $request->file('foto3');
            $filename = time() . '.' . $foto1->getClientOriginalExtension();
            Image::make($foto3)->save( public_path('/uploads/iklan/' . $filename ) );
            DB::update('update iklan set foto3 = ? where id_iklan = ?',[$filename,$id]);
        }

        return redirect()->back();

    }

    public function kategori($apa){

    	if ($apa=="all") {
    		$iklans = DB::table('iklan')->where('verified', 1)->paginate(5);
    	}else{
    		$iklans = DB::table('iklan')->where('verified', 1)->where('kategori_iklan', $apa)->paginate(5);

    	}

    		
        return view('hasilCariIklan', ['iklans' => $iklans]);
    }

        public function cari($apa){

    	if ($apa=="all") {
    		$iklans = DB::table('iklan')->where('verified', 1)->paginate(5);
    	}else{
    		$iklans = DB::table('iklan')->where('verified', 1)->where('judul_iklan', 'like' , '%'. $apa . '%')->paginate(5);

    	}
		
        return view('hasilCariIklan', ['iklans' => $iklans]);
    }

	public function find(Request $request){

	$find = $request->input('cari');	
		
        return redirect()->route('iklan.cari',['apa' => $find ]);
    }

        public function verifikasiIklan($id){

        DB::update('update iklan set verified = ? where id_iklan = ?',[1,$id]);
        
        return redirect()->back();
    }

        public function cancelIklan($id){

        DB::update('update iklan set verified = ? where id_iklan = ?',[0,$id]);
        
        return redirect()->back();
    }

        public function hapusIklan($id){

        DB::delete('delete from iklan where id_iklan = ?',[$id]);
        
        return redirect()->back();
    }


}
