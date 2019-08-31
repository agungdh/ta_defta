@extends('template.template')

@section('title')
Nilai
@endsection

@section('nav')
@include('materi.nav')
@switch($type)
    @case('materi')
        <li><a href="{{ route('materi.nilai', $materi->id) }}"> Nilai</a></li>
        @break

    @case('mid')
        <li><a href="{{ route('materi.nilaiMid') }}"> Nilai</a></li>  
        @break

    @case('akhir')
        <li><a href="{{ route('materi.nilaiAkhir') }}"> Nilai</a></li>  
        @break

    @default
        <span>Something went wrong, please try again</span>
        @break
@endswitch
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="box animated slideInLeft box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
            <div class="box-header">
              <h3 class="box-title">Data Nilai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @switch($type)
                    @case('materi')
                        <p>{{$materi->unit}} - {{$materi->materi}}</p>
                        @break

                    @case('mid')
                        <p>Ujian Mid</p>
                        @break

                    @case('akhir')
                        <p>Ujian Akhir</p>
                        @break

                    @default
                        <span>Something went wrong, please try again</span>
                        @break
                @endswitch
              <table class="table table-bordered table-hover datatable" style="width: 100%">
                <thead>
	                <tr>
                        <th>Nama</th>
	                  <th>Nilai</th>
	                  <th>Proses</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($nilais as $item)
                	<tr>
                		<td>{{$item->user->nama}}</td>
                        <td>{{$item->nilai}}</td>
                		
                		<td>

                            @switch($type)
                                @case('materi')
			                         {!! Form::open(['id' => 'formHapus' . $item->id, 'route' => ['materi.hapusNilai', $item->id], 'method' => 'delete']) !!}
                                    @break

                                @case('mid')
                                     {!! Form::open(['id' => 'formHapus' . $item->id, 'route' => ['materi.hapusNilaiMid', $item->id], 'method' => 'delete']) !!}
                                    @break

                                @case('akhir')
                                     {!! Form::open(['id' => 'formHapus' . $item->id, 'route' => ['materi.hapusNilaiAkhir', $item->id], 'method' => 'delete']) !!}
                                    @break

                                @default
                                    <span>Something went wrong, please try again</span>
                                    @break
                            @endswitch

			              		<button type="button" class="btn btn-danger btn-sm" onclick="hapus('{{ $item->id }}')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>

			              	{!! Form::close() !!}
                		</td>
                	</tr>
                	@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
function hapus(id) {
	swal({
	  title: "Yakin Hapus ???",
	  text: "Data yang sudah dihapus tidak dapat dikembalikan lagi !!!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Hapus",
	}, function(){
	  $("#formHapus" + id).submit();
	});
}
</script>
@endsection