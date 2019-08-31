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
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Gaji Supir</h3>
			</div>

			{!! Form::open(['route' => ['gajisupir.store', $id_pegawai], 'role' => 'form']) !!}
				@include('gajisupir.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('gajisupir.index', $id_pegawai)}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection