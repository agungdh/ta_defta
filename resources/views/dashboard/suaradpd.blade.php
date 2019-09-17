@extends('template.template')

@section('title')
Suara
@endsection

@section('nav')
@include('dashboard.nav')
<li><a href="{{ route('dashboard.suarapartai.index', $pemilihan->id) }}"> Suara</a></li>
@endsection

@section('content')
<script type="text/javascript">
  var PieData = [];
</script>
<div class="row">
 
  <div class="col-md-12">
    <div class="box animated jackInTheBox box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
      
      <div class="box-body">

        <div class="col-md-3">
          <div class="col-md-12">
            <div class="form-group">
              <label for="periode">Periode</label>
              <div>
                {!! Form::text('periode',$pemilihan->periode->periode,['class'=> 'form-control','placeholder'=>'Isi Periode', 'id' => 'periode', 'disabled' => true]) !!}
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="pemilihan">Pemilihan</label>
              <div>
                {!! Form::text('pemilihan',ADHhelper::displayTipePemilihan($pemilihan->tipe),['class'=> 'form-control','placeholder'=>'Isi pemilihan', 'id' => 'pemilihan', 'disabled' => true]) !!}
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <h3>Grafik</h3>
          <canvas id="pieChart" style="height:250px"></canvas>
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
                          <script type="text/javascript">
                                PieData.push({
                                  value    : {{$jumlahAllPartai}},
                                  @php
                                  $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                                  @endphp
                                  color    : '{{$color}}',
                                  highlight: '{{$color}}',
                                  label    : '{{$partai->partai}}'
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

@section('js')
@parent
<script type="text/javascript">
   //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)

    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
</script>
@endsection