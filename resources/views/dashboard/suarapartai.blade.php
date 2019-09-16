@extends('template.template')

@section('title')
Suara
@endsection

@section('nav')
@include('dashboard.nav')
<li><a href="{{ route('dashboard.suarapartai.index', $pemilihan->id) }}"> Suara</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
        <div class="box animated jackInTheBox box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
      <div class="box-body">
        <div class="col-md-6">
          <div class="form-group">
            <label for="periode">Periode</label>
            <div>
              {!! Form::text('periode',$pemilihan->periode->periode,['class'=> 'form-control','placeholder'=>'Isi Periode', 'id' => 'periode', 'disabled' => true]) !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="pemilihan">Pemilihan</label>
            <div>
              {!! Form::text('pemilihan',ADHhelper::displayTipePemilihan($pemilihan->tipe),['class'=> 'form-control','placeholder'=>'Isi pemilihan', 'id' => 'pemilihan', 'disabled' => true]) !!}
            </div>
          </div>
        </div>
      </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box animated slideInLeft box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
            <div class="box-header">
              <h3 class="box-title">Data Suara</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="">
                <table class="table table-bordered table-hover datatable" style="width: 100%">
                  <thead>
                      <tr>
                        <th>Nama Partai</th>
                        <th>Logo Partai</th>
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
                      @foreach($partais as $partai)
                      @php
                      $jumlahAllPartai = 0;
                      @endphp
                      <tr>
                          <td>{{$partai->partai}}</td>
                          <td>
                            @if(file_exists(storage_path('app/public/files/logo/' . $partai->id)))
                              <a href="{{asset('storage/files/logo/' . $partai->id)}}?nocache={{time()}}" target="_blank">
                                <img class="img-responsive" src="{{asset('storage/files/logo/' . $partai->id)}}?nocache={{time()}}">
                              </a>
                            @else
                              <img class="img-responsive" src="{{asset('storage/assets/inf')}}">
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
                                AND ds.id_partai = ?
                                AND sp.id_kecamatan IN (' . implode(",", $kecamatans) . ')', [$pemilihan->id, $partai->id]);
                              $jumlah = $afa[0]->jumlah;
                              $jumlahAllPartai += $jumlah;
                              $jumlahSuaraSah[$kabupaten->id] += $jumlah;
                            @endphp
                            <td>{{ADHhelper::rupiah($jumlah, false, false)}}</td>
                          @endforeach
                          <td>{{ADHhelper::rupiah($jumlahAllPartai, false, false)}}</td>
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
                      <th colspan="2">Jumlah Suara Sah</th>
                      @foreach($kabupatens as $kabupaten)
                      <th>{{$jumlahSuaraSah[$kabupaten->id]}}</th>
                      @endforeach
                      <th>{{$jumlahTotalSuaraSah}}</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
</div>
@endsection