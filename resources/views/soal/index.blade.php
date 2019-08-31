@extends('template.template')

@section('title')
Soal
@endsection

@section('nav')
@include('soal.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="box animated slideInLeft box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
            <div class="box-header">
              <h3 class="box-title">Data Soal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<a class="btn btn-success btn-sm" href="{{route('soal.create', $narasi->id)}}">
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </a><br><br>
              <table class="table table-bordered table-hover datatable" style="width: 100%">
                <thead>
	                <tr>
                       <th>No</th>
                       <th>Pertanyaan</th>
                       <th>Jawaban A</th>
                       <th>Jawaban B</th>
                       <th>Jawaban C</th>
                       <th>Jawaban D</th>
                       <th>Jawaban E</th>
	                   <th>Proses</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($soals as $item)
                	<tr>
                		<td>{{$item->no}}</td>
                    <td>{{$item->pertanyaan}}</td>
                    
                    <td>
                      @if($item->kunci == 'a')
                      <b style="color: green;">
                      @else
                      <b style="color: red;">  
                      @endif
                      {{$item->jawaban_a}}
                      </b>
                    </td>
                    
                    <td>
                      @if($item->kunci == 'b')
                      <b style="color: green;">
                      @else
                      <b style="color: red;">  
                      @endif
                      {{$item->jawaban_b}}
                      </b>
                    </td>
                    
                    <td>
                      @if($item->kunci == 'c')
                      <b style="color: green;">
                      @else
                      <b style="color: red;">  
                      @endif
                      {{$item->jawaban_c}}
                      </b>
                    </td>
                    
                    <td>
                      @if($item->kunci == 'd')
                      <b style="color: green;">
                      @else
                      <b style="color: red;">  
                      @endif
                      {{$item->jawaban_d}}
                      </b>
                    </td>
                    
                    <td>
                      @if($item->kunci == 'e')
                      <b style="color: green;">
                      @else
                      <b style="color: red;">  
                      @endif
                      {{$item->jawaban_e}}
                      </b>
                    </td>

                		<td>

			                {!! Form::open(['id' => 'formHapus' . $item->id, 'route' => ['soal.destroy', $item->id], 'method' => 'delete']) !!}

                        <a class="btn btn-primary btn-sm" href="{{route('soal.edit', $item->id)}}">
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

@include('soal.narasi')
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