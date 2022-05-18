<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RT-KU Sistem Informasi Pelayanan Rukun Tetangga</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('/superwarga/assets/img/rt.jpeg')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('/superwarga/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('/superwarga/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/superwarga/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('/superwarga/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/superwarga/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('/superwarga/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('/superwarga/assets/css/style.css')}}" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-svg/jquery.svg.css') }}"> 
    <script type="text/javascript" src="{{ asset('jquery-svg/jquery.svg.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jquery-svg/jquery.svganim.js') }}"></script>

    <!-- =======================================================
  * Template Name: BizLand - v3.7.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="homee">RT-KU<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#fitur">Fitur</a></li>
                    <li><a class="nav-link scrollto " href="#faq">F.A.Q</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="nav-link scrollto " href="{{ ('login') }}">Login</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('register_tamu') }}">Tamu</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Welcome to <span>RT-KU</span></h1>
            <h2>Sistem Informasi Pelayanan Rukun Tetangga</h2>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up" id="svg_denah" style="height: 500px;">

            </div>
        </section>
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tentang Kami</h2>
                    <h3>Deskripsi<span>Tentang Kami</span></h3>
                </div>
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{asset('/superwarga/assets/img/1.jpg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <h3>RT-KU</h3>
                        <p class="fst-">
                            Aplikasi RT-KU merupakan aplikasi yang bertujuan untuk membantu mempermudah tugas-tugas
                            rutin Pengurus Rukun Tetangga (RT) dalam menata administrasi warga maupun keuangan sehingga
                            menjadi lebih transparan.
                            Dari aplikasi ini juga diharapkan dapat mempererat hubungan antar warga, menumbuhkan rasa
                            persaudaraan antar warga, saling mengenal, saling peduli dan
                            saling berbagi informasidengan warga sekitar khususnya tetangga di lingkungannya.
                        </p>
                    </div>
                </div>

            </div>
        </section>
        <section id="fitur" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Fitur</h2>
                    <h3>Check Our <span>Fitur</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">

                            <div class="member-info">
                                <h4>Warga</h4>
                                <span>Fitur ini berfungsi untuk pengelolaan data dan penyajian informasi yang terkait
                                    dengan warga, warga pendatang, warga pindah alamat, serta fasilitas-fasilitas lain yang dapat diakses
                                    langsung oleh warga.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="member-info">
                                <h4>Keuangan</h4>
                                <span>Fitur ini berfungsi untuk mempermudah dan mempercepat proses pelaporan  dan
                                    pengelolaan transaksi - transaksi keuangan yang dikelola oleh Pengurus RT, sehingga
                                    tata kelola administrasi keuangan RT akan lebih tertib, transparan dan tertata
                                    dengan baik.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="member-info">
                                <h4>Admin</h4>
                                <span>Fitur ini hanya diperuntukkan bagi Pengurus Desa, RW, dan RT untuk mempersiapkan data-data yang
                                    diperlukan, monitoring data, modifikasi data, setting dan konfigurasi, sehingga
                                    mempermudah proses pendataan dan penyajian informasi akan menjadi valid dan selalu
                                    up to date.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-info">
                                <h4>Informasi</h4>
                                <span>Fitur ini merupakan fasilitas untuk mendapatkan informasi - informasi yang sangat
                                    berguna dan bermanfaat baik bagi warga, pengurus RT maupun bagi pihak-pihak lain
                                    yang membutuhkan. Informasi dapat diakses secara mudah setiap saat dan kapanpun dan
                                    dimanapun anda berada.</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Modul</h2>
                    <h3>Check our <span>Moduls</span></h3>

                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">Administratif</a></h4>
                            <p>Fitur Warga merupakan pendataan administrasi kependudukan yang terkait langsung dengan
                                warga.</p>
                            <p>Pendataan warga, tamu warga, warga pindah, surat menyurat , agenda, kegiatan, gallery, laporan keuangan, pembuatan jadwal ronda, kritik saran, pengaduan atau pelaporan, permohonan kartu akses kendaraan, 
                                dll.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Monitoring</a></h4>
                            <p>Desa dan RW dapat melakukan monitoring data warga dilingkungannya.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">Keuangan</a></h4>
                            <p> Keuangan merupakan fitur untuk RT dapat mengelola laporan pemasukan dan pengeluaran pada kas RT.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4><a href="">Agenda</a></h4>
                            <p>RT dapat mencatat semua agenda kegiatannya, menambahkan galery meliputi foto dan video dokumentasi kegiatan yang dapat diakses semua
                                warga.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-slideshow"></i></div>
                            <h4><a href="">Informasi</a></h4>
                            <p>Informasi Warga pendatang,
                                Informasi Warga Kurang Mampu,
                                Informasi Berita / Pengumuman,
                                Informasi Kegiatan,
                                Informasi Profile RT,
                                Informasi Struktur Organisasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->


        <!-- ======= Team Section ======= -->


        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>F.A.Q</h2>
                    <h3>Frequently Asked <span>Questions</span></h3>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <ul class="faq-list">
                            <li>
                                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Apa tujuan
                                    penggunaan aplikasi RT-KU?<i class="bi bi-chevron-down icon-show"></i><i
                                        class="bi bi-chevron-up icon-close"></i></div>
                                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        Aplikasi RT-KU didesain bukan hanya untuk administrasi data warga, tetapi
                                        ditujukan untuk pengelolaan lingkungan warga sebagaimana sistem informasi
                                        standar manajemen moderen, namun sangat praktis dan mudah digunakan bahkan oleh
                                        pengguna paling awam sekalipun.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Siapakah yang
                                    harus mendaftarkan lingkungan sebagai pengguna aplikasi?<i
                                        class="bi bi-chevron-down icon-show"></i><i
                                        class="bi bi-chevron-up icon-close"></i></div>
                                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        Pengurus lingkungan yang harus mendaftarkan lingkungannya.
                                        Dengan sudah terdaftarnya lingkungan, maka pengurus sudah bisa membuat user id
                                        sendiri dan langsung menggunakan seluruh fitur tanpa melibatkan warga.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Apa keuntungan
                                    penggunaan aplikasi untuk warga? <i class="bi bi-chevron-down icon-show"></i><i
                                        class="bi bi-chevron-up icon-close"></i></div>
                                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        Warga dengan mudah mendapatkan informasi yang disampaikan oleh ketua RT,melihat
                                        pemasukan dan pengeluaran uang kas warga, warga dapat lebih mengenal mengenai
                                        kepengurusan rukun tetangga dan security, digitalisasi surat menyurat yang lebih
                                        memudahkan warga dibanding dengan cara manual dengan cara mendatangkan rumah
                                        ketua RT secara langsung, dan fasilitas pengaduan/pelaporan mengenai lingkungan
                                        sekitar.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Bagaimana warga
                                    dapat mengakses aplikasi RT-KU<i class="bi bi-chevron-down icon-show"></i><i
                                        class="bi bi-chevron-up icon-close"></i></div>
                                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        Warga dapat mengakses aplikasi RT-KU dengan cara login terdahulu pada halaman
                                        utama RT-KU lalu setelah berhasil login maka warga akan masuk ke halaman
                                        website warga yang dikelola oleh masing masing ketua RT.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Bagaimana cara
                                    mendaftarkan RT pada lingkungan saya?<i class="bi bi-chevron-down icon-show"></i><i
                                        class="bi bi-chevron-up icon-close"></i></div>
                                <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        Untuk pendaftaran dan info lebih lanjut
                                        dapat
                                        dilakukan melalui chat pada admin
                                        kami.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3><span>Contact Us</span></h3>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Jl. Palm Hill No.107, Kadumangu, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>sekretariatdesakadumanggu@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>021-87952146</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-6 ">
                    
                        <iframe class="mb-4 mb-lg-0"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253712.6492526185!2d106.71239820723446!3d-6.488706114702405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c12da61d9c2f%3A0xccddbc04b7a0ffbc!2sKantor%20Ds.%20Kadumanggu!5e0!3m2!1sid!2sid!4v1651731559470!5m2!1sid!2sid"
                            frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col form-group">
                                    <input id="nama" type="text" name="nama" class="form-control" id="nama"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col form-group">
                                    <input id="email" type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="telepon " type="tel" class="form-control" name="telepon" id="telepon"
                                    placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <textarea id="pesan" class="form-control" name="pesan" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">kirim</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>RT-KU<span>.</span></h3>
                        <p>
                            Griya Alam Sentul <br>
                            A8 no 5 Kecamatan<br>
                            Babakan Madang <br><br>
                            <strong>Phone:</strong> 0877-2235-0785<br>
                            <strong>Email:</strong> dityakayaa221@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#fitur">Fitur</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#faq">F.A.Q</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Hubungi Sosial Media Kami</p>
                        <div class="social-links mt-3">
                            <a href="https://mobile.twitter.com/_23aditya06_" class="twitter"><i
                                    class="bx bxl-twitter"></i></a>
                            <a href="https://www.facebook.com/profile.php?id=100006485602157" class="facebook"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="https://instagram.com/adityanurwahyudi?utm_medium=copy_link" class="instagram"><i
                                    class="bx bxl-instagram"></i></a>
                            <a href="https://id.linkedin.com/in/aditya-nurwahyudi-56898115a" class="linkedin"><i
                                    class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>RT-KU</span></strong>.
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                Designed by <a>Aditya Nurwahyudi</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->

    <script src="{{asset('/superwarga/assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{asset('/superwarga/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('/superwarga/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/superwarga/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('/superwarga/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/superwarga/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('/superwarga/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('/superwarga/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('/superwarga/assets/js/main.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#svg_denah').svg();
            var svg = $('#svg_denah').svg('get'); 
            svg.line(10, 0, 10, 500, {stroke: 'black', strokeWidth: 2, class_: 'myline'});
            svg.line(40, 0, 40, 240, {stroke: 'black', strokeWidth: 2, class_: 'myline1'});
            svg.line(40, 270, 40, 500, {stroke: 'black', strokeWidth: 2, class_: 'myline2'});
            svg.line(40, 240, 500, 240, {stroke: 'black', strokeWidth: 2, class_: 'myline3'});
            svg.line(40, 270, 500, 270, {stroke: 'black', strokeWidth: 2, class_: 'myline3'});

            svg.text(200, 260, 'Jalan Raya Centex', {fontSize: 15, fontFamily: 'Verdana', fill: 'black'});
            g1 = svg.group({transform: 'translate(30,190)'});
            g2 = svg.group(g1, {transform: 'rotate(-90)'});
            svg.text(g2, 0, 0, 'Jalan Pulo Gebang',{fontSize: 15, fontFamily: 'Verdana', fill: 'black'});

            var img = svg.image(45, 50, 40, 40, 'img/home.png', {onclick: 'imageClick(evt)'}); 
            svg.title(img, 'Rumah Pak RT');
            var img = svg.image(220, 195, 40, 40, 'img/home.png', {onclick: 'imageClick(evt)'}); 
            svg.title(img, 'Rumah Sekretaris'); 
        })

        function imageClick(evt){
            var circle = evt.target;
            var currentRadius = circle.getAttribute("width"); 
            if (currentRadius == 40){
            circle.setAttribute("width", currentRadius * 2); 
            circle.setAttribute("height", currentRadius * 2);
            }else{
            circle.setAttribute("width", currentRadius * 0.5); 
            circle.setAttribute("height", currentRadius * 0.5); 
            }
        }
    </script>
</body>
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        
    })
</script>

@if(Session::has('success'))
    <script>
        Swal.fire(
            '',
            '{{ Session::get("success") }}',
            'success'
        )
    </script>
@endif
@if(Session::has('error'))
    <script>
        Swal.fire(
            '',
            '{{ Session::get("error") }}',
            'error'
        )
    </script>
@endif
</html>