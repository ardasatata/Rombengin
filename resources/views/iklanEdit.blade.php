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
<form name="TIKLAN" id="TIKLAN" method="post" action="{{ route('iklan.edit',['id' => $data['id'] ]) }}">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <h1>ADD NEW ITEMS</h1>
		<label>Judul</label> : <input name="judul" type="text" id="TJUDUL" size="30" maxlength="45" value='<?php echo $data['judul']; ?>'><br><br>
		<label>Harga</label> : <input name="harga" type="text" id="THARGA" size="30" maxlength="30" value='<?php echo $data['harga']; ?>'><br><br>
		<label>Kategori</label> :
			<select name="kategori" id="TKATEGORI">
			<option value="GADG">Gadget dan Komputer</option>
			<option value="OTOMOTIF">Otomotif</option>
			<option value="HOBI">Hobi dan Olahraga</option>
			<option value="ELEKTRO">Elektronik Rumah Tangga</option>
			<option value="FASHION">Fashion</option>
			<option value="PERABOTAN">Perabotan</option>
			<option value="LAINLAIN">Peralatan Lainnya</option>
			</select><br><br>
		<label>Foto 1</label> : <input type="file" name="foto1" ><br>

		<label>Foto 2</label> : <input type="file" name="foto2"><br>

		<label>Foto 3</label> : <input type="file" name="foto3"><br>
		<label>Status</label> :
			<select name="terjual" id="TKONDISI">
			<option value="0">Belum Laku</option>
			<option value="1">Laku</option>
			</select><br><br>
		<label>Deskripsi</label> : <textarea name="konten" cols="50" rows="8" id="TDESKR" value='<?php echo $data['konten']; ?>'></textarea><br><br>
    <div id="btn">
    <br>
		<input type="submit" name="btnSubmit" id="btnSubmit" value="Submit">
		<input type="reset" name="btnReset" id="btnReset" value="Reset">
    </div>
</form>


@endsection
