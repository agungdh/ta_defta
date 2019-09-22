<h3><center>REKAPITULASI HASIL SEMENTARA PENGHITUNGAN SUARA PILPRES DI PROVINSI LAMPUNG {{$pemilihan->periode->periode}}</center></h3>
<table style="width: 100%" border="1">
  <thead>
      <tr>
        <th>No Urut</th>
        <th>Paslon Capres</th>
        <th>Foto</th>
        @foreach($kabupatens as $kabupaten)
        <th>{{$kabupaten->kabupaten}}</th>
        @endforeach
        <th>Jumlah</th>
      </tr>
  </thead>
  <tbody>
      @php
      $jumlahSuaraSah = [];
      $jumlahTotalSuaraSah = 0;

      foreach ($kabupatens as $kabupaten) {
        $jumlahSuaraSah[$kabupaten->id] = 0;
      }

      @endphp
      @foreach($capress as $capres)
      @php
      $jumlahAllCapres = 0;
      @endphp
      <tr>
          <td>{{$capres->no_urut}}</td>
          <td>{{$capres->paslon_capres}}</td>
          <td>
            @if(file_exists(storage_path('app/public/files/foto/' . $capres->id)))
              <a href="{{asset('storage/files/foto/' . $capres->id)}}?nocache={{time()}}" target="_blank">
                <img style="width: 100px; height: 100px" src="{{asset('storage/files/foto/' . $capres->id)}}?nocache={{time()}}">
              </a>
            @else
              <img style="width: 100px; height: 100px" src="{{asset('storage/assets/inf')}}">
            @endif
          </td>
          @foreach($kabupatens as $kabupaten)
            @php
              $kecamatans_raw = App\Models\Kecamatan::where('id_kabupaten', $kabupaten->id)->get();
              $kecamatans = [];
              foreach ($kecamatans_raw as $kecamatan_raw) {
                $kecamatans[] = $kecamatan_raw->id;
              }
              
              $afa = DB::select('SELECT sum(ds.jumlah) jumlah
                FROM pemilihan pl, suara_pemilihan sp, detil_suara_pemilihan ds
                WHERE ds.id_suara_pemilihan = sp.id
                AND sp.id_pemilihan = pl.id
                AND pl.id = ?
                AND ds.id_paslon_capres = ?
                AND sp.id_kecamatan IN (' . implode(",", $kecamatans) . ')', [$pemilihan->id, $capres->id]);
              $jumlah = $afa[0]->jumlah;
              $jumlahAllCapres += $jumlah;
              $jumlahSuaraSah[$kabupaten->id] += $jumlah;
            @endphp
            <td>{{ADHhelper::rupiah($jumlah, false, false)}}</td>
          @endforeach
          <td>{{ADHhelper::rupiah($jumlahAllCapres, false, false)}}</td>
          <script type="text/javascript">
                PieData.push({
                  value    : {{$jumlahAllCapres}},
                  @php
                  $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                  @endphp
                  color    : '{{$color}}',
                  highlight: '{{$color}}',
                  label    : '{{$capres->paslon_capres}}'
                });
          </script>
      </tr>
      @endforeach
  </tbody>
  @php
  foreach ($jumlahSuaraSah as $item) {
    $jumlahTotalSuaraSah += $item;
  }
  @endphp
  <tfoot>
    <tr>
      <th colspan="3">Jumlah Suara Sah</th>
      @foreach($kabupatens as $kabupaten)
      <th>{{ADHhelper::rupiah($jumlahSuaraSah[$kabupaten->id], false, false)}}</th>
      @endforeach
      <th>{{ADHhelper::rupiah($jumlahTotalSuaraSah, false, false)}}</th>
    </tr>
  </tfoot>
</table>