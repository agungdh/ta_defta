@extends('template.template')

@section('title')
Narasi
@endsection

@section('nav')
@include('narasi.nav')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
        <div class="box animated slideInLeft box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
            <div class="box-header">
              <h3 class="box-title">Data Narasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p>{{$materi->unit}} - {{$materi->materi}}</p>
              <a class="btn btn-success btn-sm" href="{{route('narasi.create', $materi->id)}}">
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </a><br><br>
              <table class="table table-bordered table-hover datatable" style="width: 100%">
                <thead>
                  <tr>
                       <th>No</th>
                       <th>Narasi</th>
                       <th>Jumlah Soal</th>
                       <th>Proses</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @php
                  $now = 1;
                  @endphp --}}
                  @foreach($narasis as $item)
                  <tr>
                    <td>{{$item->no}}</td>
                    <td>{{substr($item->isi_cerita,0,50).'...'}}</td>
                    {{-- <td>{{count($item->soals)}} ({{$now}})</td> --}}
                    <td>{{count($item->soals)}}</td>
                    <td>

                      {!! Form::open(['id' => 'formHapus' . $item->id, 'route' => ['narasi.destroy', $item->id], 'method' => 'delete']) !!}

                        <a class="btn btn-default btn-sm" href="{{route('soal.index', $item->id)}}">
                          <i class="glyphicon glyphicon-question-sign"></i> Soal
                        </a>

                        <a class="btn btn-primary btn-sm" href="{{route('narasi.edit', $item->id)}}">
                          <i class="glyphicon glyphicon-pencil"></i> Edit
                        </a>

                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('{{ $item->id }}')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  {{-- @php
                  $now += count($item->soals);
                  @endphp --}}
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