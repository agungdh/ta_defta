@extends('template.template')

@section('title')
Materi
@endsection

@section('nav')
@include('materi.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="box animated jackInTheBox box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Materi</h3>
			</div>

			{!! Form::open(['route' => 'materi.store', 'role' => 'form', 'files' => true]) !!}
				@include('materi.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('materi.index')}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection