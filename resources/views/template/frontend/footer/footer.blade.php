<footer class="footer section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget">
                    <h4 class="text-capitalize mb-4">RT-KU</h4>
                    <p>RT-KU adalah suatu pelayanan sistem informasi yang bertujuan untuk membantu
                        mempermudah
                        tugas-tugas rutin Pengurus Rumah Tangga (RT) dalam menata administrasi warga maupun
                        keuangan sehingga menjadi lebih transparan.

                    </p>

                </div>
                <?php
            
        $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;

            $userrt = DB::table('users')
            ->where('users.rw', $rw)
            ->where('users.rt', $rt)
            ->join('profile','profile.id_users','users.id')
            ->where('users.status', 2)->first();
            ?>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widget">
                    <h4 class="text-capitalize mb-4">Links</h4>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a href="home">Home</a></li>
                        <li><a href="profile">Profile</a></li>
                        <li><a href="service">Pengajuan Surat</a></li>
                        <li><a href="kegiatan">Kegiatan</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget">
                    <h4 class="text-capitalize mb-4">Alamat</h4>
                    <p>{{ $userrt->alamat }}"</p>
                </div>
            </div>

            <div class="col-lg-3 ml-auto col-sm-6">
            <div class="widget">
                    <div class="logo mb-4">
                        <h3>Hubungi Kami</h3>
                    </div>
                    <h6><a href="mailto:{{ $userrt->email }}?subject=RT-KU%20&body=Saya%20Warga%20Aplikasi%20RT-KU%20" >
                    {{ $userrt->email }}</a></h6>
                    <a href="tel:{{ $userrt->telepon }}"><span class="text-color h4">{{ $userrt->telepon }}</span></a>
                </div>
            </div>
        </div>

        <div class="footer-btm pt-4">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">

                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="copyright">
                        &copy; Copyright Reserved to <span class="text-color">Aditya Nurwahyudi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>