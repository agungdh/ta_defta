<div class="row">
  <div class="col-md-12">
    <div class="box animated slideInLeft box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
      <div class="box-body">

        <p>{{$materi->unit}} - {{$materi->materi}}</p>
        
        @php
        $class = $errors->has('isi_cerita') ? 'form-group has-error' : 'form-group';
        $message = $errors->has('isi_cerita') ? $errors->first('isi_cerita') : '';
        @endphp
        <div class="{{$class}}">
          <label for="isi_cerita" data-toggle="tooltip" title="{{$message}}">Narasi</label>
          <div data-toggle="tooltip" title="{{$message}}">
            {!! Form::textarea('isi_cerita',$narasi->isi_cerita,['class'=> 'form-control','placeholder'=>'Isi isi_cerita', 'id' => 'Narasi', 'style' => 'resize: none;', 'rows' => 10, 'readonly' => true]) !!}
          </div>
        </div>

      </div>
    </div>
  </div>
</div>