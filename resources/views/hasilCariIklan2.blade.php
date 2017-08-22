@extends('layouts.app')

@section('content')
<div id="viewIklan" style="text-align:center; margin: auto; width: 800px">
<div id="mainWrapper">

  <section id="search"> 
            <input type="text"  id="search" value="search">
      <input type="button" name="search_button" id="button" value="Search">
  </section>
  <div id="content">
    
<section class="searchResult">
<p>Hasil Pencarian Anda</p>
      <div class="productRow">
        <div class="container" style="margin: auto ;text-align:center;">
  <table border="0" class="table borderless">

    @foreach ($iklans as $iklan)
        <tr>

            <td><a href = '{{ route('iklan.index',['id' => $iklan->id_iklan ]) }}'>{{ $iklan->judul_iklan }}</a><br>
            @if(($iklan->terjual) == 0)
                <?php echo "Belum Terjual" ?>
              @else
              <?php echo "Sold" ?>
              @endif </td>
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