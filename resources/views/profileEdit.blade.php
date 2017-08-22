@extends('layouts.app')
    <style type="text/css">
    #FEDIT { margin:1% auto;width:500px;padding:10px;}
    h1 { padding:5px;margin:10px;text-align:center;ffont-family:'Montserrat';color: rgba(146,146,146,1.00);}
    form label { float:left; width:100px;}
    form br { clear:left;font-family: sans-serif;}
    #btn { margin:10px; text-align:center;padding:5px; }
</style>
@section('content')
<form name="FEDIT" id="FEDIT" method="post" action= "/profile/<?php echo $data['id'];?>/edit">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <h1>Edit Your Profile</h1>
    <br>
    <label>Name</label> : <input name="name" type="text" id="FNAME" size="30" maxlength="40" value = '<?php echo $data['name']; ?>'><br>
    <label>Address</label> : <textarea name="alamat" cols="30" rows="3" id="FADDRESS" value = '<?php echo $data['alamat']; ?>'></textarea><br>
    <label>Email</label> : <input name="email" type="text" id="FEMAIL" size="40" maxlength="100" value = '<?php echo $data['email']; ?>'><br>
    <label>Password</label> : <input name="password" type="text" id="FPASS" size="40" maxlength="100" value = '<?php echo "" ?>'><br>
    <label>Phone</label> : <input name="phone" type="text" id="FPHONE" size="40" maxlength="100" value = '<?php echo $data['phone']; ?>'><br>
    <div id="btn">
    <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit">
    <input type="reset" name="btnReset" id="btnReset" value="Reset">
    </div>
</form>

  @if(Auth::id() == $data['id'])
        <div class="uploadPhoto" style="text-align: left; margin: auto; max-width: 300">
          <form enctype="multipart/form-data" action="/profile" method="POST">
          <label>Update Profile Image</label>
          <input type="file" name="avatar">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <br>
          <input type="submit" class="pull-left btn btn-sm btn-primary">
          </form>
        </div>
       @else

      @endif

@endsection
