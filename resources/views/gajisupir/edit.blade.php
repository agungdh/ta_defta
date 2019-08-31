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
				<h3 class="box-title">Ubah Gaji Supir</h3>
			</div>

			{!! Form::model($gajiSupir, ['route' => ['gajisupir.update', $gajiSupir->id], 'role' => 'form', 'method' => 'put']) !!}
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