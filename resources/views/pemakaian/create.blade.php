@extends('template.template')

@section('title')
Pemakaian
@endsection

@section('nav')
@include('pemakaian.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Pemakaian</h3>
			</div>

			{!! Form::open(['route' => 'pemakaian.store', 'role' => 'form']) !!}

				@include('pemakaian.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('pemakaian.index')}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection