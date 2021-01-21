<nav class="navbar navbar-expand-lg navbar-dark bg-danger" style="padding: 1rem 5rem;">
    <a class="navbar-brand" href="{{url('/')}}">Antrian Layanan Mahasiswa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            @if (!session('is_member'))
                <a class="nav-item nav-link active" href="{{url('login')}}">Login</a>
                <a class="nav-item nav-link active" href="{{url('register')}}">Register</a>
            @else
                <a class="nav-item nav-link active" href="{{url('logout')}}">Logout</a>
            @endif
        </div>
    </div>
</nav>
<input type="hidden" id="baseUrl" value="{{url('/')}}">