@extends('template.template')

@section('title')
Sewa Kendaraan
@endsection

@section('nav')
@include('sewakendaraan.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Sewa Kendaraan</h3>
			</div>

			{!! Form::open(['route' => ['sewakendaraan.store', $id_kendaraan], 'role' => 'form']) !!}
				@include('sewakendaraan.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('sewakendaraan.index', $id_kendaraan)}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection