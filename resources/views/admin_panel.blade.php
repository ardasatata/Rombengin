@extends('layouts.app')

@section('content')
<div id="adminPanel" style="text-align:left; padding-left:20%;">
  <h2>Admin Panel</h2>

  <p><a href="{{ url('/insert') }}">User Add</a>
  <p><a href="{{ url('/user-update') }}">User Edit</a>
  <p><a href="{{ url('/delete-user') }}">User Delete</a></p>
  <p><a href="{{ url('/view-all-iklan') }}">Lihat Semua Iklan</a></p>
</div>

@endsection
