@extends('template.template')

@section('title')
Petugas Jaga
@endsection

@section('nav')
@include('petugasjaga.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Petugas Jaga</h3>
			</div>

			{!! Form::open(['route' => 'petugasjaga.store', 'role' => 'form']) !!}
				@include('petugasjaga.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('petugasjaga.index')}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection