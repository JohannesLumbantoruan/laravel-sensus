<nav class="navbar navbar-expand-md bg-dark navbar-dark mb-5">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">SENSUS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('warga') }}"><i class="fa fa-users"></i> Data Warga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('desa') }}"><i class="fa fa-database"></i> Data Desa</a>
                </li>    
                <li class="nav-item">
                    <a href="{{ route('dusun') }}" class="nav-link"><i class="fa fa-table"></i> Data Dusun</a>
                </li>
            </ul>

            <div class="dropdown ml-auto">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                    Hai, <b>{{ Auth::guard('admin')->user()->username }}</b>
                </button>
                <div class="dropdown-menu">
                    <a href="{{ route('gantiPassword') }}" class="dropdown-item"><i class="fa fa-lock"></i> Ganti Password</a>
                    <a href="{{ route('logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
            </div>
        </div>
        </div>
    </div>  
</nav>