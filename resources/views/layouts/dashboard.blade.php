<h1>Selamat Datang di Dashboard Anda, {{ Auth::user()->name }}!</h1>

<p>Ini adalah area pribadi Anda.</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>