<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            @if(Auth::guard('admin')->user()->status == 4) {{-- Kelurahan --}}
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('admin.kelurahan.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard Kelurahan
                </a>
                <div class="sb-sidenav-menu-heading">Data-Data</div>
                <a class="nav-link" href="{{ route('admin.kelurahan.dataloginwarga') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                    Data Login RW
                </a>
            </div>
            @elseif(Auth::guard('admin')->user()->status == 3) {{-- RW --}}
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('admin.rw.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard RW
                </a>
                <div class="sb-sidenav-menu-heading">Data-Data</div>
                <a class="nav-link" href="{{ route('admin.rw.dataloginwarga') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                    Data Login RT
                </a>
            </div>
            @elseif(Auth::guard('admin')->user()->status == 2) {{-- RT --}}
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('admin.rt.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Data-Data</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                    Sistem Pendukung Keputusan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.rt.SPK-warga') }}">Data Sistem Pendukung Keputusan</a>
                        <a class="nav-link" href="{{ route('admin.rt.kriteria') }}">Kriteria</a>
                    </nav>
                </div>
                <a class="nav-link" href="{{ route('admin.rt.dataloginwarga') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                    Data Login Warga
                </a>
                <a class="nav-link" href="{{ route('admin.rt.beritadankegiatan') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>
                    Berita dan Kegiatan
                </a>
                <a class="nav-link" href="{{ route('admin.rt.galeri') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-film"></i></div>
                    Galeri
                </a>
                <a class="nav-link" href="{{ route('admin.rt.profile') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                    Profile RT
                </a>
                <a class="nav-link" href="{{ route('admin.rt.keuangan') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-university"></i></div>
                    Keuangan
                </a>
                <a class="nav-link" href="{{ route('admin.rt.kendaraan') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-car"></i></div>
                    Data Pemohon Kartu Akses Kendaraan
                </a>
                <a class="nav-link" href="{{ route('admin.rt.surat') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-envelope"></i></div>
                    Pengajuan Surat
                </a>
                <a class="nav-link" href="{{ route('admin.rt.kritiksaran') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-question"></i></div>
                    Kritik dan Saran
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError"
                    aria-expanded="false" aria-controls="pagesCollapseError">
                    <div class="sb-nav-link-icon"><i class="fa fa-lock"></i></div>
                    Keamanan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.rt.security') }}">Security</a>
                        <a class="nav-link" href="{{ route('admin.rt.keluarmasukwarga') }}">Data Keluar Masuk Warga</a>
                        <a class="nav-link" href="{{ route('admin.rt.pengaduan') }}">Pengaduan / Pelaporan</a>
                        <a class="nav-link" href="{{ route('admin.rt.jadwalronda') }}">Jadwal Ronda</a>
                    </nav>
                </div>
            </div>
            @endif
        </div>
    </nav>
</div>