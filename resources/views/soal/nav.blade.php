<li><a href="{{ route('materi.index') }}"><i class="fa fa-home"></i> Materi</a></li>
<li><a href="{{ route('narasi.index', $materi->id) }}"> Narasi</a></li>
<li><a href="{{ route('soal.index', $narasi->id) }}"> Soal</a></li>