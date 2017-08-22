@extends('layouts.app')
  <head>
    <link href="{{ URL::asset('AboutPageAssets/styles/aboutPageStyle.css') }}" rel="stylesheet" type="text/css" >

  </head>
@section('content')
<div class="profile">
<div class="container">
    <header>
    <!--   -->
  <div class="xxx"> 
    <!-- Profile photo --> 
    <img src="{{ URL::asset('/uploads/avatars/'.$data['avatar']) }}"
    style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;">

  </div>

  <!-- Identity details -->
  <section class="profileHeader">
    <h1>{{{ $data['name'] }}}</h1>
    <hr>
  </section>



  <!-- Links to Social network accounts -->
  <aside class="socialNetworkNavBar">
  </aside>
</header>
<!-- content -->
<section class="mainContent"> 
  <!-- Contact details -->
  <section class="section1">
    <h2 class="sectionTitle">Contact</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <div class="section1Content">
      <p><span>Email :</span> {{{ $data['email'] }}}</p>
      <p><span>Phone :</span> {{{ $data['phone'] }}}</p>
      <p><span>Address :</span> {{{ $data['alamat'] }}} </p>
    </div>
  </section>
  <!-- content 2 -->

  <!-- Links to expore your past projects and download your CV -->
  @if(Auth::id() == $data['id'])
      <aside class="externalResourcesNav">
    <div class="externalResources"> <a href="{{ route('profile.edit',['id' => Auth::id() ]) }}" title="Edit">EDIT PROFILE</a> </div>
    <span class="stretch"></span>
    <span class="stretch"></span>
    <div class="externalResources"><a href="{{ route('iklan.saya',['id' => Auth::id() ]) }}" title="Github Link">IKLAN SAYA</a> </div>
  </aside>
       @else

  @endif

  
</section>
<footer>
  <hr>
</footer>
</div>
</div>
@endsection
