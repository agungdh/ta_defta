@extends('template.template')

@section('title')
Narasi
@endsection

@section('nav')
@include('narasi.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="box animated slideInLeft box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Narasi</h3>
			</div>

			{!! Form::open(['route' => ['narasi.store', $materi->id], 'role' => 'form']) !!}
				@include('narasi.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('narasi.index', $materi->id)}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection