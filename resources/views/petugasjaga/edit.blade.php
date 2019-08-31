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
				<h3 class="box-title">Ubah Petugas Jaga</h3>
			</div>

			{!! Form::model($petugasJaga, ['route' => ['petugasjaga.update', $petugasJaga->id], 'role' => 'form', 'method' => 'put']) !!}
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