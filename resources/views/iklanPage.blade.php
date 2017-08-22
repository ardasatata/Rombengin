@extends('layouts.app')
  <head>
  	<style type="text/css">
    #TIKLAN { margin:1% auto;width:550px;padding:50px;}
    h1 { padding:5px;margin:10px;text-align:center;font-family:'Montserrat';color: rgba(146,146,146,1.00);}
    form label { float:left; width:100px;}
	form option { float:left; width:100px;}
    form br { clear:left;font-family: sans-serif;}
    #btn { margin:10px; text-align:center;padding:5px; }
</style>
  </head>
  
@section('content')
<form name="TIKLAN" id="TIKLAN" method="post" action="/pasang">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
		
		<label>View</label> : {{{$data['view_count']}}}<br><br>
		<label>Judul</label> : {{{$data['judul']}}}<br><br>
		<label>Penjual</label> :<a href = '{{ route('profile.index',['id' => $data['id'] ]) }}'> {{{$data['name']}}}</a><br><br>
		<label>Harga</label> : {{{$data['harga']}}}<br><br>
		<label>Kategori</label> : {{{$data['kategori']}}}<br><br>
		<label>Status</label> : @if($data['terjual']==0)
									<?php echo "belum terjual" ?>
								  @else
								  <?php echo "terjual" ?>
								@endif
								<br><br>
		<label>Deskripsi</label> : {{{$data['konten']}}}</textarea><br><br>
		<img src="{{ URL::asset('/uploads/iklan/'.$data['foto1']) }}"
    	style="width:200px; height:200px; float:left; ">

    	<img src="{{ URL::asset('/uploads/iklan/'.$data['foto2']) }}"
    	style="width:200px; height:200px; float:left; ">

    	<img src="{{ URL::asset('/uploads/iklan/'.$data['foto3']) }}"
    	style="width:200px; height:200px; float:left; ">

    <div id="btn">
    <br>
		<input type="submit" name="btnSubmit" id="btnSubmit" value="Contact">

    </div>
</form>


@endsection
