<h2>Добро пожаловать {{Auth::user()->name }}</h2>
<br>
@if (Auth::user()->avatar)
    <img src="{{ Auth::user()->avatar }}" style="width:230px;" alt="">
@endif
<br>
@if (Auth::user()->is_admin)
<a href="{{ route('admin.index') }}">admin panel</a>
@endif
<br>
<a href="{{ route('logout') }}">Выход</a>


