
<header class="navigation">
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="index">
                RT-KU</span>
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <input class='chatMenu hidden' id='offchatMenu' type='checkbox' />
            <?php
            
        $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;

            $wa = DB::table('users')
            ->where('users.rw', $rw)
            ->where('users.rt', $rt)
            ->join('profile','profile.id_users','users.id')
            ->where('users.status', 2)->first();
            ?>
            
<label class='chatButton' for='offchatMenu'>
    <svg class='svg-1' viewBox='0 0 32 32'>
        <g>
            <path
                d='M16,2A13,13,0,0,0,8,25.23V29a1,1,0,0,0,.51.87A1,1,0,0,0,9,30a1,1,0,0,0,.51-.14l3.65-2.19A12.64,12.64,0,0,0,16,28,13,13,0,0,0,16,2Zm0,24a11.13,11.13,0,0,1-2.76-.36,1,1,0,0,0-.76.11L10,27.23v-2.5a1,1,0,0,0-.42-.81A11,11,0,1,1,16,26Z'>
            </path>
            <path
                d='M19.86,15.18a1.9,1.9,0,0,0-2.64,0l-.09.09-1.4-1.4.09-.09a1.86,1.86,0,0,0,0-2.64L14.23,9.55a1.9,1.9,0,0,0-2.64,0l-.8.79a3.56,3.56,0,0,0-.5,3.76,10.64,10.64,0,0,0,2.62,4A8.7,8.7,0,0,0,18.56,21a2.92,2.92,0,0,0,2.1-.79l.79-.8a1.86,1.86,0,0,0,0-2.64Zm-.62,3.61c-.57.58-2.78,0-4.92-2.11a8.88,8.88,0,0,1-2.13-3.21c-.26-.79-.25-1.44,0-1.71l.7-.7,1.4,1.4-.7.7a1,1,0,0,0,0,1.41l2.82,2.82a1,1,0,0,0,1.41,0l.7-.7,1.4,1.4Z'>
            </path>
        </g>
    </svg>
    <svg class='svg-2' viewBox='0 0 512 512'>
        <path
            d='M278.6 256l68.2-68.2c6.2-6.2 6.2-16.4 0-22.6-6.2-6.2-16.4-6.2-22.6 0L256 233.4l-68.2-68.2c-6.2-6.2-16.4-6.2-22.6 0-3.1 3.1-4.7 7.2-4.7 11.3 0 4.1 1.6 8.2 4.7 11.3l68.2 68.2-68.2 68.2c-3.1 3.1-4.7 7.2-4.7 11.3 0 4.1 1.6 8.2 4.7 11.3 6.2 6.2 16.4 6.2 22.6 0l68.2-68.2 68.2 68.2c6.2 6.2 16.4 6.2 22.6 0 6.2-6.2 6.2-16.4 0-22.6L278.6 256z'>
        </path>
    </svg>
</label>
<div class='chatBox'>
    <div class='chatContent'>
        <div class='chatHeader'>
            <svg viewbox='0 0 32 32'>
                <path
                    d='M24,22a1,1,0,0,1-.64-.23L18.84,18H17A8,8,0,0,1,17,2h6a8,8,0,0,1,2,15.74V21a1,1,0,0,1-.58.91A1,1,0,0,1,24,22ZM17,4a6,6,0,0,0,0,12h2.2a1,1,0,0,1,.64.23L23,18.86V16.92a1,1,0,0,1,.86-1A6,6,0,0,0,23,4Z'>
                </path>
                <rect height='2' width='2' x='19' y='9'></rect>
                <rect height='2' width='2' x='14' y='9'></rect>
                <rect height='2' width='2' x='24' y='9'></rect>
                <path
                    d='M8,30a1,1,0,0,1-.42-.09A1,1,0,0,1,7,29V25.74a8,8,0,0,1-1.28-15,1,1,0,1,1,.82,1.82,6,6,0,0,0,1.6,11.4,1,1,0,0,1,.86,1v1.94l3.16-2.63A1,1,0,0,1,12.8,24H15a5.94,5.94,0,0,0,4.29-1.82,1,1,0,0,1,1.44,1.4A8,8,0,0,1,15,26H13.16L8.64,29.77A1,1,0,0,1,8,30Z'>
                </path>
            </svg>
            <div class='chatTitle'>Silahkan chat <span>Admin akan membalas dalam beberapa
                    menit</span></div>
        </div>
    </div>
    <a class='chatStart'
        href='https://api.whatsapp.com/send?phone=62{{ $wa->telepon }}&text=Assalamualaikum,%20Saya%20ingin%20bertanya'
        rel='nofollow noreferrer' target='_blank'>
        <span>Mulai chat...</span>
    </a>
</div>
<?php
            $id_users = Auth::guard('user')->user()->id;
            $users = DB::table('users')->where('users.id',$id_users)
            ->leftjoin('detail_users','detail_users.id_users','users.id')
            ->first();
            ?>
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
                        <input id="nama" type="text" placeholder="Nama Lengkap" value="{{ $users->name }}" name="nama" required>

                        <label for="tanggal"><b>Tanggal</b></label><br>
                        <input id="tanggal" type="text" placeholder="Tanggal" class="form-control" name="tanggal" required>
                        <br>
                        <label for="alamat"><b>Alamat</b></label>
                        <input id="alamat" type="text" placeholder="Alamat Terkini" value="{{ $users->alamat }}" name="alamat" required>

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
                    <li class="nav-item"><a class="nav-link" href="{{ route('warga.profile') }}">Profile RT</a></li>
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
                        <li><a class="dropdown-item"   style="width:auto;" >{{ $users->name }}</a></li>    
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

<script>
        $(function() {
            flatpickr("#tanggal", {
                 enableTime: false,
                 dateFormat: "Y-m-d ",
                 minDate: "today"
                });
        });
 
    </script>
<!-- Header Close -->