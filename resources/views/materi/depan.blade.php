@extends('template.template')

@section('title')

@endsection

@section('nav')
@include('materi.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">

    <video loop autoplay height="auto" width="100%">
        <source src="{{asset('storage/assets')}}/animate/read.mp4" type="video/mp4">
    </video>

	</div>
</div>

@endsection
