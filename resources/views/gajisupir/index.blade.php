@extends('template.template')

@section('title')
Gaji Supir
@endsection

@section('nav')
@include('gajisupir.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Gaji Supir</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<a class="btn btn-success btn-sm" href="{{route('gajisupir.create', $id_pegawai)}}">
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </a><br><br>
              <table class="table table-bordered table-hover datatable" style="width: 100%">
                <thead>
	                <tr>
                       <th>Bulan</th>
                       <th>Tahun</th>
                       <th>Sewa</th>
	                   <th>Proses</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($gajiSupirs as $item)
                	<tr>
                		<td>{{$item->bulan}}</td>
                        <td>{{$item->tahun}}</td>
                        <td>{{ADHhelper::ribuan($item->gaji)}}</td>
                		
                		<td>

			                {!! Form::open(['id' => 'formHapus' . $item->id, 'route' => ['gajisupir.destroy', $item->id], 'method' => 'delete']) !!}

                        <a class="btn btn-primary btn-sm" href="{{route('gajisupir.edit', $item->id)}}">
				                  <i class="glyphicon glyphicon-pencil"></i> Edit
				                </a>

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