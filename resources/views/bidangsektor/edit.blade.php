@extends('template.template')

@section('title')
Bidang Sektor
@endsection

@section('nav')
@include('bidangsektor.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Ubah Bidang Sektor</h3>
			</div>

			{!! Form::model($bidangSektor, ['route' => ['bidangsektor.update', $bidangSektor->id], 'role' => 'form', 'method' => 'put']) !!}
				@include('bidangsektor.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('bidangsektor.index')}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection