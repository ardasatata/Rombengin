@extends('layouts.app')

@section('content')
<div id="viewIklan" style="text-align:center; margin: auto; width: 800px">
<div id="mainWrapper">

  <section id="search"> 
      <form name="TIKLAN" enctype="multipart/form-data" id="TIKLAN" method="post" action="/cari">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input name="cari" type="text" id="TJUDUL" size="30" maxlength="45"> 
      <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit">
  </section>
  <div id="content">
    
<section class="searchResult">
<p>Hasil Pencarian Anda</p>
      <div class="productRow">
        <div class="container" style="margin: auto ;text-align:center;">
  <table border="0" class="table borderless">

    @foreach ($iklans as $iklan)
        <tr>
            <td><img src="{{ URL::asset('/uploads/iklan/'.$iklan->foto1) }}"
                style="width:100px; height:100px; float:left; "></td>
            <td><a href = '{{ route('iklan.index',['id' => $iklan->id_iklan ]) }}'>{{ $iklan->judul_iklan }}</a><br>
            @if(($iklan->terjual) == 0)
                <?php echo "Belum Terjual" ?>
              @else
              <?php echo "Sold" ?>
              @endif <br>
              <label>View</label> : {{$iklan->view_count}}<br><br>
              </td>
            <td>{{ $iklan->konten_iklan }}</td>


            <td>Rp. {{ $iklan->harga }}</td>
         </tr>
    @endforeach
    </table>
</div>

{{ $iklans->links() }}
      </div>  
    </section>
  </div>
</div>

</div>

@endsection