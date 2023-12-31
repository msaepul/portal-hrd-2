<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="../../assets/img/brand/logo jordan.png" style="width:100%; height:auto;" class="navbar-brand-img"
                    alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <h6 class="navbar-heading p-0 text-muted">Main Menu</h6>
                <hr class="my-1">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="ni ni-archive-2 text-green"></i>
                            <span class="nav-link-text">Dashbaord</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-dashboards">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Lowongan Kerja</span>
                        </a>
                        <div class="collapse show" id="navbar-dashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('loker') }}" class="nav-link">Input Lowongan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('loker.listapply') }}" class="nav-link">List
                                        Pendaftar</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <br>
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">Master Data</h6>
                <hr class="my-1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata.cabang') }}">
                            <i class="fas fa-building"></i>
                            <span class="nav-link-text">Cabang</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata.dept') }}">
                            <i class="fas fa-users"></i>
                            <span class="nav-link-text">Departement</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterdata.skill') }}">
                            <i class="fas fa-wrench"></i>
                            <span class="nav-link-text">Skill</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
