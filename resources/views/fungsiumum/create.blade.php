@extends('template.template')

@section('title')
Fungsi Umum
@endsection

@section('nav')
@include('fungsiumum.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Fungsi Umum</h3>
			</div>

			{!! Form::open(['route' => 'fungsiumum.store', 'role' => 'form']) !!}
				@include('fungsiumum.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('fungsiumum.index')}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection