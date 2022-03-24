<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard RT</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{asset('/sbadmin/css/styles.css')}}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="homeRT">Administrator</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="homeRT">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Data-Data</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Kependudukan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href=".html">Data Kependudukan Berdasarkan Usia</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Data Kependudukan Berdasarkan
                                    Pekerjaan</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="dataloginwarga">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Pemohon
                        </a>
                        <a class="nav-link" href="profilee">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Profile RT
                        </a>
                        <a class="nav-link" href="beritaa">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Berita
                        </a>
                        <a class="nav-link" href="kegiatann">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Kegiatan
                        </a>
                        <a class="nav-link" href="galerii">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Galeri
                        </a>
                        <a class="nav-link" href="sistempengambilankeputusan">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Sistem Pengambilan Keputusan
                        </a>
                        <a class="nav-link" href="keuangann">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Keuangan
                        </a>
                        <a class="nav-link" href="surat">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Pengajuan Surat
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseError" aria-expanded="false"
                            aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Keamanan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="security">Security</a>
                                <a class="nav-link" href="keluarmasukwarga">Data Keluar Masuk Warga</a>
                                <a class="nav-link" href="jadwalronda">Jadwal Ronda</a>
                                <a class="nav-link" href="pengaduan">Pengaduan / Pelaporan</a>
                                <a class="nav-link" href="kritiksaran">Kritik dan Saran</a>
                            </nav>
                        </div>


                        <div class="sb-sidenav-menu-heading">Data berdasarkan Grafik</div>
                        <a class="nav-link" href="grafik">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Grafik
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Data Pemohon</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Data Pemohon</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Data Pemohon
                        </div>

                        <div class="card-body">
                            <form action="/SPKWarga/save" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label>Nama Warga</label>
                                <select id="nama" class="form-control" name="nama" required>
                                    <option value="anam">anam</option>
                                    <option value="mana">mana</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <label>Penghasilan</label>
                                <select id="penghasilan" class="form-control" name="penghasilan" required>
                                    <option value="> 5.000.000"> >5.000.000</option>
                                    <option value="3.000.000 - <5.000.000">3.000.000 - < 5.000.000 </option>
                                    <option value="1.000.000 - <3.000.000"> 1.000.000 - < 3.000.000 </option>
                                    <option value="500.000 - 1.000.000">500.000 - 1.000.000 </option>
                                    <option value="<500.000">
                                        < 500.000 </option>
                                </select>
                                <br>
                                <label>Pekerjaan</label>
                                <select id="pekerjaan" class="form-control" name="pekerjaan" required>
                                    <option value="pengusaha">Pengusaha</option>
                                    <option value="pns"> PNS </option>
                                    <option value=" pegawaiswasta">Pegawai Swasta</option>
                                    <option value="serabutan">serabutan</option>
                                    <option value="tidak bekerja">Tidak Bekerja</option>
                                </select>
                                <br>
                                <label>Jumlah Tanggungan</label>
                                <select id="tanggungan" class="form-control" name="tanggungan" required>
                                    <option value=">5 orang"> > 5 Orang</option>
                                    <option value="3-4 orang"> 3-4 Orang </option>
                                    <option value="1-2 orang">1-2 Orang</option>
                                    <option value="tidakpunyatanggungan">Tidak Punya Tanggungan</option>
                                </select>
                                <br>
                                <label>Kendaraan</label>
                                <select id="kendaraan" class="form-control" name="kendaraan" required>
                                    <option value=">mobil&motor">Mobil dan Motor</option>
                                    <option value="mobil">Mobil</option>
                                    <option value="motor">Motor</option>
                                    <option value="tidakpunyakendaraan">Tidak Punya Kendaraan</option>
                                </select>
                                <br>
                                <label>Kondisi Rumah</label>
                                <select id="rumah" class="form-control" name="rumah" required>
                                    <option value="layak">Layak</option>
                                    <option value="tidaklayak">Tidak Layak</option>
                                </select>
                                <br>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="hidden" id="status" name="status" value="" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Sistem Informasi Pelayanan Rukun Tetangga</div>
                        <div>
                            <a>Copyright &copy;</a>
                            &middot;
                            <a>RT-KU</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
        </script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>