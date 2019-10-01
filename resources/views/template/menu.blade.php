@if(ADHhelper::getUserData()->level == 'opprov')
<li :class="{'active': kabupaten}">
  <a href="{{ route('kabupaten.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Kabupaten</span>
  </a>
</li>

<li :class="{'active': periode}">
  <a href="{{ route('periode.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Periode</span>
  </a>
</li>

<li :class="{'active': partai}">
  <a href="{{ route('partai.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Partai</span>
  </a>
</li>

<li :class="{'active': calondpd}">
  <a href="{{ route('calondpd.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Calon DPD</span>
  </a>
</li>

<li :class="{'active': pasloncapres}">
  <a href="{{ route('pasloncapres.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Paslon Capres</span>
  </a>
</li>

<li :class="{'active': user}">
  <a href="{{ route('user.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>User</span>
  </a>
</li>
@endif

<li :class="{'active': pemilihan}">
  <a href="{{ route('pemilihan.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Pemilihan</span>
  </a>
</li>

<li :class="{'active': test}">
  <a href="{{ route('test.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Test</span>
  </a>
</li>