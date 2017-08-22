@extends('layouts.app')

<head>    <link rel="stylesheet" href="{{ URL::asset('unslider-master/dist/css/unslider-dots.css') }}"></head>

@section('content')
<div class="container">
    <div id="mainWrapper">
  <section id="offer" background="{{ URL::asset('/img/bg.jpg') }}" style="background-image: url({{ URL::asset('/img/rombeng.jpg') }}); max-height: 300px">
    <!-- The offer section displays a banner text for promotions -->
    <h2 style="color: white;">Rombeng.in</h2>
    <p style="color: white;">dibuang jadi uang</p>
  </section>
  <div id="content">
    <section class="sidebar">
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
      <form name="TIKLAN" enctype="multipart/form-data" id="TIKLAN" method="post" action="/cari">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input name="cari" type="text" id="search" > 
      <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit">

      <div id="menubar">
        <nav class="menu">
          <h2><!-- Title for menuset 1 -->CATEGORIES </h2>
          <hr>
          <ul>
            <!-- List of links under menuset 1 -->
            <li><a href="/kategori/gadg" title="Link">Gadget dan Komputer</a></li>
            <li><a href="/kategori/otomotif" title="Link">Otomotif</a></li>
            <li><a href="/kategori/hobi" title="Link">Hobi dan Olahraga</a></li>
            <li><a href="/kategori/elektro" title="Link">Elektronik Rumah Tangga</a></li>
            <li><a href="/kategori/fashion" title="Link">Fashion</a></li>
            <li><a href="/kategori/perabotan" title="Link">Perabotan</a></li>
            <li><a href="/kategori/lainlain" title="Link">Peralatan Lainnya</a></li>
          </ul>
        </nav>
</div>
    </section>
<section class="mainContent">
          <table border="0" class="table borderless">

    @foreach ($iklans as $iklan)
        <tr>
            <td><img src="{{ URL::asset('/uploads/iklan/'.$iklan->foto1) }}"
                style="width:100px; height:100px; float:left; "></td>
            <td style="text-align: left;"><a href = "{{ route('iklan.index',['id' => $iklan->id_iklan ]) }}" style="font-size: 18px; padding: auto;">{{ $iklan->judul_iklan }}</a><br>
            @if(($iklan->terjual) == 0)
                <?php echo "Belum Terjual" ?>
              @else
              <?php echo "Sold" ?>
              @endif  <br>
              <label>View</label> : {{$iklan->view_count}}<br><br>
              </td>
            <td><p style="float: none; padding: auto; margin: auto;">Rp. {{ $iklan->harga }}</p></td>
         </tr>
    @endforeach
    </table>
</div>


    </section>
  </div>
</div>
</div>

<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="{{ URL::asset('unslider-master/src/js/unslider.js') }}"></script> <!-- but with the right path! -->
  <script>
    jQuery(document).ready(function($) {
      $('.my-slider').unslider({
animation: 'fade',
autoplay: true,
arrows: false
});
    });
  </script>
@endsection
