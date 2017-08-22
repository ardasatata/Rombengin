

@extends('layouts.app')
    <style type="text/css">
    #FEDIT { margin:1% auto;width:500px;padding:10px;}
    h1 { padding:5px;margin:10px;text-align:center;ffont-family:'Montserrat';color: rgba(146,146,146,1.00);}
    form label { float:left; width:100px;}
    form br { clear:left;font-family: sans-serif;}
    #btn { margin:10px; text-align:center;padding:5px; }
</style>
@section('content')

   
   <body>
   <div style="text-align:center; margin: auto; max-width: 400px">
     <a href = "/admin"> Click Here</a> to go back
      <form action = "/create" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

         <table>
            <tr>
               <td>nama</td>
               <td><input type='text' name='name' /></td>
            </tr>
            <tr>
               <td>email</td>
               <td><input type='text' name='email' /></td>
            </tr>
            <tr>
               <td>pass</td>
               <td><input type='text' name='pass' /></td>
            </tr>
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Input"/>
               </td>
            </tr>
         </table>

      </form>
      </div>

   </body>

@endsection
