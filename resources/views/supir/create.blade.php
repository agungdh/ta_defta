@extends('template.template')

@section('title')
Supir
@endsection

@section('nav')
@include('supir.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Supir</h3>
			</div>

			{!! Form::open(['route' => 'supir.store', 'role' => 'form']) !!}
				@include('supir.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('supir.index')}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection