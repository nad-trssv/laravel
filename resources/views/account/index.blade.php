<h2>Добро пожаловать {{Auth::user()->name }}</h2>
<br>
<a href="{{ route('admin.index') }}">admin panel</a>
<br>
<a href="{{ route('logout') }}">Выход</a>