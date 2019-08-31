@if(ADHhelper::getUserData()->level == 'a')
<li>
  <a href="{{ route('user.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>User</span>
  </a>
</li>
@endif

<li>
  <a href="{{ route('materi.index') }}">
    <i class="fa fa-calendar-check-o"></i> <span>Materi</span>
  </a>
</li>