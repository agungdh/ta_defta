@extends('template.template')

@section('title')
Soal
@endsection

@section('nav')
@include('soal.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="box animated slideInLeft box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
			<div class="box-header with-border">
				<h3 class="box-title">Ubah Soal</h3>
			</div>

			{!! Form::model($soal, ['route' => ['soal.update', $soal->id], 'role' => 'form', 'method' => 'put']) !!}
				@include('soal.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('soal.index', $materi->id)}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@include('soal.narasi')
@endsection