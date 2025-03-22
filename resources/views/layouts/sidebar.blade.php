<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    PERPUSKU
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link" href="{{ route('buku.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Buku
                </a>

                <a class="nav-link" href="{{ route('member.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Member
                </a>
                <a class="nav-link" href="{{ route('petugas.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Petugas
                </a>
                <a class="nav-link" href="{{ route('transaksi.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Transaksi
                </a>
                <a class="nav-link" href="{{ route('kategori.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Kategori
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start library
        </div>
    </nav>
</div>
