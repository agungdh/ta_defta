@extends('template.template')

@section('title')
Ujian
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
<div class="box  box-primary animated slideInLeft" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.50); border-radius: 10px;">
            <div class="box-header with-border">
                <p>{{$materi->unit}} - {{$materi->materi}}</p>
                {!! Form::open(['route' => ['materi.simpanUjian', $materi->id], 'role' => 'form']) !!}
                <p>Siswa Waktu <span id="textSisaWaktu"></span></p>
            </div>

            <div class="box-body">

                @php
                $i = 1;
                @endphp
                @foreach($narasis as $narasi)
                    <div id="narasi__{{$narasi->id}}">

                        <textarea style="resize: none;" rows="10" readonly class="form-control">{{$narasi->isi_cerita}}</textarea>

                        @foreach($soals[$narasi->id] as $soal)

                            @php
                            $pertanyaans = [];

                            $pertanyaans[0]['id_soal'] = $soal->id;
                            $pertanyaans[0]['value'] = 'a';
                            $pertanyaans[0]['jawaban'] = $soal->jawaban_a;

                            $pertanyaans[1]['id_soal'] = $soal->id;
                            $pertanyaans[1]['value'] = 'b';
                            $pertanyaans[1]['jawaban'] = $soal->jawaban_b;

                            $pertanyaans[2]['id_soal'] = $soal->id;
                            $pertanyaans[2]['value'] = 'c';
                            $pertanyaans[2]['jawaban'] = $soal->jawaban_c;

                            $pertanyaans[3]['id_soal'] = $soal->id;
                            $pertanyaans[3]['value'] = 'd';
                            $pertanyaans[3]['jawaban'] = $soal->jawaban_d;

                            $pertanyaans[4]['id_soal'] = $soal->id;
                            $pertanyaans[4]['value'] = 'e';
                            $pertanyaans[4]['jawaban'] = $soal->jawaban_e;
                            @endphp

                            <div class="col-md-12">
                                <p>{{$soal->no}}. {{$soal->pertanyaan}}</p>

                                <ol type="a">
                                    @foreach($pertanyaans as $pertanyaan)
                                    <li><input type="radio" name="soal[{{$pertanyaan['id_soal']}}]" value="{{$pertanyaan['value']}}">{{$pertanyaan['jawaban']}}</li>
                                    @endforeach
                                </ol>                        
                            </div>

                            @php
                            $i++;
                            @endphp
                        @endforeach
                    </div>
                @endforeach

                <div style="text-align: center;">
                    <button class="btn btn-primary" type="button" onclick="prev()" id="btnPrev"><</button>
                    <button class="btn btn-primary" type="button" onclick="next()" id="btnNext">></button>
                    <br>
                    <button class="btn btn-success" type="button" onclick="cekSubmit()">Kirim Jawaban</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    var narasis_keys = JSON.parse('{{json_encode($narasis_keys)}}');
    var current_narasis_key = 0;

    $(function() {
        narasis_keys.forEach(function(data) {
            $("#narasi__" + data).hide();
        });

        $("#narasi__" + narasis_keys[current_narasis_key]).show();

        configButton();
    });

    function configButton() {
        if (current_narasis_key == 0) {
            $("#btnPrev").prop('class', 'btn btn-default');
        } else {
            $("#btnPrev").prop('class', 'btn btn-primary');
        }

        if (current_narasis_key == narasis_keys.length - 1) {
            $("#btnNext").prop('class', 'btn btn-default');
        } else {
            $("#btnNext").prop('class', 'btn btn-primary');
        }
    }

    function prev() {
        if (current_narasis_key != 0) {
            $("#narasi__" + narasis_keys[current_narasis_key]).hide();

            current_narasis_key--;

            $("#narasi__" + narasis_keys[current_narasis_key]).show();

            configButton();
        }

    }

    function next() {
        if (current_narasis_key != narasis_keys.length - 1) {
            $("#narasi__" + narasis_keys[current_narasis_key]).hide();

            current_narasis_key++;

            $("#narasi__" + narasis_keys[current_narasis_key]).show();

            configButton();
        }
    }

    function cekSubmit() {
        var data = $("form").serializeArray();

        if (data.length < {{array_sum(array_map('count', $soals)) + 1}} ) {
            swal('Peringatan', `Masih ada ${ {{array_sum(array_map('count', $soals)) + 1}} - data.length} soal yang belum dijawab`, 'error');
        } else {
            swal({
              title: "Konfirmasi",
              text: "Yakin Kirim jawaban ?",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Kirim",
            }, function(){
              $("form").submit();
            });
        }
    }

    var countDownDate = new Date().addMinutes({{$materi->durasi}}).getTime();
    var x = setInterval(function() {
    var now = new Date().getTime();

    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    siswaWaktu = `${hours} Jam ${minutes} Menit ${seconds} Detik`
    $("#textSisaWaktu").text(siswaWaktu);

    if (distance < 0) {
        clearInterval(x);
        $("form").submit();
    }
    }, 1000);
</script>
@endsection