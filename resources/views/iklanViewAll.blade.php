@extends('layouts.app')

@section('content')
<div id="viewIklan" style="text-align:center; margin: auto; width: 800px">

<div class="container" style="margin: auto ;text-align:center;">
	<table border="1" class="table table-bordered">
		<thead>
		<tr>
            <td> ID Iklan </td>
            <td> ID Penjual </td>
            <td> Kategori Iklan </td>
            <td> Judul Iklan </td>
            <td> Konten Iklan </td>
            <td> Harga </td>
            <td> Status </td>
            <td> Verifikasi Admin </td>
         </tr>
         </thead>
    @foreach ($iklans as $iklan)
        <tr>

            <td><a href = '{{ route('iklan.index',['id' => $iklan->id_iklan ]) }}'>{{ $iklan->id_iklan }}</a></td>
            <td>{{ $iklan->id_penjual }}</td>
            <td>{{ $iklan->kategori_iklan }}</td>
            <td>{{ $iklan->judul_iklan }}</td>
            <td>{{ $iklan->konten_iklan }}</td>
            <td>{{ $iklan->harga }}</td>

            <td>  @if(($iklan->terjual) == 0)
            		<?php echo "Belum Terjual" ?>
       				@else
       				<?php echo "Sold" ?>
      				@endif	
      		</td>

            <td>  @if(($iklan->verified) == 0)
            		<?php echo "Belum Diverifikasi" ?>
       				@else
       				<?php echo "Verified" ?>
      				@endif	
      		</td>
          <td><a href = '{{ route('iklan.verifikasi',['id' => $iklan->id_iklan ]) }}'>Y</a>
          <a href = '{{ route('iklan.cancel',['id' => $iklan->id_iklan ]) }}'>N</a></td>
          <td><a href = '{{ route('iklan.hapus',['id' => $iklan->id_iklan ]) }}'>Hapus</a></td>
         </tr>
    @endforeach
    </table>
</div>

{{ $iklans->links() }}

</div>

@endsection