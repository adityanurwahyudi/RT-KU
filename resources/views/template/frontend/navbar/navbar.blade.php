

<!-- Header Start -->
<header class="navigation">
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="index">
                RT-KU</span>
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

             <!-- Modal pindah -->
             <div class="modal fade" id="modal-pindah" role="dialog" style="z-index:1500" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                <div class="imgcontainer">
                        <img src="{{asset('/loginform/images/pindah.jpg')}}" alt="Avatar" class="avatar">
                    </div>
                </div>
                <form id="formTambahSurat" action="{{ route('warga.prosespindah') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <label for="nama"><b>Nama Lengkap</b></label>
                        <input id="nama" type="text" placeholder="Nama Lengkap" name="nama" required>

                        <label for="tanggal"><b>Tanggal</b></label><br>
                        <input id="tanggal" type="date" placeholder="Tanggal" class="form-control" name="tanggal" required>
                        <br>
                        <label for="alamat"><b>Alamat</b></label>
                        <input id="alamat" type="text" placeholder="Alamat Terkini" name="alamat" required>

                        <label for="alamatpindah"><b>Alamat Pindah</b></label>
                        <input id="alamatpindah" type="text" placeholder="Alamat Pindah" name="alamatpindah" required>

                        <label for="deskripsi"><b>Keterangan Pindah</b></label>
                        <input id="deskripsi" type="text" placeholder="deskripsi Pindah" name="deskripsi" required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

            <!-- Button to open the modal login form -->
            <div id="id01" class="modal">

                <form class="modal-content animate" action="{{ route('warga.prosespindah') }}" method="post">
                {{ csrf_field() }}    
                <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close"
                            title="Close Modal">&times;</span>
                    </button>
                        <img src="{{asset('/loginform/images/pindah.jpg')}}" alt="Avatar" class="avatar">
                    </div>

                    <div class="container">
                        <label for="nama"><b>Nama Lengkap</b></label>
                        <input id="nama" type="text" placeholder="Nama Lengkap" name="nama" required>

                        <label for="tanggal"><b>Tanggal</b></label><br>
                        <input id="tanggal" type="date" placeholder="Tanggal" class="form-control" name="tanggal" required>
                        <br>
                        <label for="alamat"><b>Alamat</b></label>
                        <input id="alamat" type="text" placeholder="Alamat Terkini" name="alamat" required>

                        <label for="alamatpindah"><b>Alamat Pindah</b></label>
                        <input id="alamatpindah" type="text" placeholder="Alamat Pindah" name="alamatpindah" required>

                        <label for="deskripsi"><b>Keterangan Pindah</b></label>
                        <input id="deskripsi" type="text" placeholder="deskripsi Pindah" name="deskripsi" required>

                        <center>
                        <button class="btn btn-main" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>    
                          Kirim</button>
                        </center>
                    </div>
                </form>
            </div>
            <?php
            $id_users = Auth::guard('user')->user()->id;
            $users = DB::table('users')->where('id',$id_users)->orderBy('id','ASC')->first();
            
            
            ?>
            <div id="id02" class="modal">

                <form class="modal-content animate" action="{{ route('warga.profil_update') }}" method="post">
                
                {{ csrf_field() }}    
                <div class="imgcontainer">
                        <span onclick="document.getElementById('id02').style.display='none'" class="close"
                            title="Close Modal">&times;</span>
                        <img src="{{asset('/loginform/images/akun.png')}}" alt="Avatar" class="avatar">
                    </div>

                    <div class="container">
                        <input type="hidden" id="id" name="id" value="{{ $users->id }}">
                        <label for="nama"><b>Nama Lengkap</b></label>
                        <input id="nama" type="text" placeholder="Nama Lengkap" value="{{ $users->name }}" name="nama" readonly>
                        
                        <label for="email"><b>Email</b></label>
                        <input id="email" type="text" placeholder="Email" value="{{ $users->email }}" name="email" required>

                        <label for="password"><b>Password</b></label>
                        <input id="password" type="text" placeholder="Password" value="{{ $users->password_real }}" name="password" required> 
                        <center>
                        <button class="btn btn-main" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>      Kirim</button>
                        </center>
                    </div>
                </form>
            </div>
            
            <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.profile') }}">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.service') }}">Pengajuan Surat</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.galeri') }}">Galeri</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Informasi</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown05">
                            <li><a class="dropdown-item" href="{{ route('warga.berita') }}">Berita</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.kegiatan') }}">Kegiatan</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.datawargaa') }}">Data Warga</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.keuangan') }}">Keuangan</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.keamanan') }}">Keamanan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.contact') }}">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown06">
                            <li><a class="dropdown-item"  onclick="document.getElementById('id02').style.display='block'" style="width:auto;" >Ubah Akun</a></li>
                            <li><a class="dropdown-item"  data-toggle="modal" data-target="#modal-pindah" >Pindah</a></li>
                            <li><a class="dropdown-item" href="{{ route('warga.datawarga') }}">Formulir</a></li>
                            <li onclick="event.preventDefault();document.getElementById('logout').submit();"><a class="dropdown-item" href="#">Logout</a></li>
                            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header Close -->