@if(ADHhelper::getUserData()->level == 'opprov')
<li>
  <a href="{{ route('kabupaten.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Kabupaten</span>
  </a>
</li>

<li>
  <a href="{{ route('periode.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Periode</span>
  </a>
</li>

<li>
  <a href="{{ route('partai.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Partai</span>
  </a>
</li>

<li>
  <a href="{{ route('calondpd.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Calon DPD</span>
  </a>
</li>

<li>
  <a href="{{ route('pasloncapres.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Paslon Capres</span>
  </a>
</li>

<li>
  <a href="{{ route('user.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>User</span>
  </a>
</li>
@endif

<li>
  <a href="{{ route('pemilihan.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Pemilihan</span>
  </a>
</li>