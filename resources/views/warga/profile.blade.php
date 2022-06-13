@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<section class="page-title bg-profile2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Tentang Kami</span>
                    <h1 class="text-capitalize mb-4 text-lg">Profile</h1>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section About Start -->
<section class="section about-2 position-relative">
    <div class="container">
        <div class="row">
                    @foreach($profile as $p)
            <div class="col-lg-6 col-md-6">
                <div class="about-item pr-3 mb-5 mb-lg-0">
                    <br><br><br><br><br><br>
                    <h2 class="mt-3 mb-4 position-relative content-title">{{ $p->nama }}
                    </h2>
                    <p class="mb-5"><br><br>{{ $p->deskripsi }}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="about-item-img">
                <br><br><br>
                    <img src="{{asset('upload/profile/'.$p->profilert)}}" width="400" height="200"class="img-fluid">
                </div>
            </div>
        </div>
    </div>
<br><br><br><br>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="about-info-item mb-4 mb-lg-0">
                    <h3 class="mb-3"><span class="text-color mr-2 text-md ">Alamat</span></h3>
                    <h4>{{ $p->alamat }}.</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="about-info-item mb-4 mb-lg-0">
                    <h3 class="mb-3"><span class="text-color mr-2 text-md">Nomer Telepon</span></h3>
                    <h4>{{ $p->telepon }}.</h4>
                </div>
            </div>
        </div>
<br><br>
<!--  Section Services Start -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">Struktur Organisasi</span>
                    <h2 class="mt-3 content-title">Struktur Organisasi Pada RT </h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <img src="{{asset('upload/profile/'.$p->strukturorganisasi)}}" width="500" height="500">

        </div>
                        @endforeach
    </div>
    <center>
    <div class="section-title">
                    <span class="h6 text-color">Penjelasan</span>
                    <h2 class="mt-3 content-title">Penjelasan Ke Organisasian</h2>
                </div></center>
<div class="container ">
    <div class="panel-group" id="faqAccordion">
    <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Ketua RT dan Wakil 
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      Ketua RT bertugas melakukan koordinasi semua kegiatan organisasi RT yang sudah menjadi tanggung jawabnya. Ketua RT juga harus memberikan arahan-arahan teknis operasional dari organisasi kepada pengurus RT yang lain agar mengerti dan paham tentang tupoksinya masing-masing.

Setelah itu, RT melaporkan hasil pelaksanaan tugas serta pengelolaan keuangan kepada masyarakat setiap pertemuan dengan tembusan kepala desa melalui ketua RW dalam waktu yang sudah ditentukan sesuai ketetapan pemerintah desa dan kabupaten/kota masing-masing.

Secara organisasi, ketua RT memang bertanggung jawab kepada ketua RW. Namun, secara operasional, ketua RT bertanggung jawab kepada masyarakat. Sementara itu, sekretaris, bendahara dan pengurus RT lain bertanggung jawab kepada ketua RT.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Sekretaris dan Wakil Sekretaris
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      Sekretaris dan wakilnya memiliki tugas yang berhubungan dengan pelayanan kegiatan administrasi kepada seluruh anggota RT. Sekretaris juga berperan penting dalam mengurus surat menyurat, pemberian nomor surat yang dalam hal itu sangat penting keberadaanya oleh desa.

Sekretaris menyelenggarakan kegiatan tata laksana organisasi RT, melakukan persiapan guna menyelenggarakan rapat serta kegiatan dalam rangka melaksanakan tugas organisasi RT, melaporkan hasil pelaksanaan kegiatan dan tugas organisasi RT, mengelola barang inventaris yang dimiliki RT serta melakukan tugas lain yang diberikan oleh ketua RT.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         Bendahara RT
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      Seperti bendahara pada umumnya, bendahara RT memiliki tugas untuk melakukan pengelolaan keuangan dan melaporkannya kepada ketua RT. Seperti menyusun anggaran kegiatan RT, mengelola pemasukan dan pengeluaran RT, menganalisa pemasukan tambahan dan pengeluaran yang tidak terduga. Tugas bendahara desa dalam penatausahaan ditunjang menggunakan buku.

Laporan disampaiakan dalam pertemuan rutin yang sudah ditetapkan bersama. Tujuannya adalah agar pengelolaan keuangan dapat tertib dan transparan. Selanjutnya, dalam melaksanakan tugasnya, bendahara melakukan koordinasi dengan ketua, sekretaris dan seksi bidang.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Seksi Pembangunan dan Kesejahteraan Sosial.
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      Seksi pada bidang ini melaksanakan hal yang berhubungan dengan kesejahteraan masyarakat seperti pendataan warga penerima subsidi dan bantuan, penyuluhan kesehatan, penggalangan dana, usul perbaikan sarana dan prasarana yang dimiliki RT.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Seksi Keamanan dan Lingkungan Hidup
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      Seksi pada bidang ini melaksanakan tugas yang berhubungan dengan keamanan lingkungan RT dan desa. Seperti bersama RW mengelola siskamling, pengawasan terhadap orang asing yang masuk besera perizinan tempat di lingkungannya atas kesepakatan dengan ketua RT. Selain itu, seksi ini juga bertuga dalam perencanaan, pelaksanaan dan pengawasan kegiatan yang berhubungan dengan lingkungan hidup dalam lingkup RT.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Seksi Pemberdayaan Perempuan. 
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      Seksi ini memiliki tugas seperti penyuluhan atau sekedar memberikan informasi mengenai program-program yang berhubungan dengan perempuan. Seksi ini juga berkoordinasi dengan organisasi pemberdayaan desa yang lain seperti dengan tim posyandu untuk meningkatkan kesejahteraan ibu dan anaknya. Tak jarang juga melalui seksi ini, RT melaksanakan pelatihan khusus ibu rumah tangga.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Seksi Pemuda, Olahraga dan Seni Budaya.
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      Seksi ini melaksanakan tugas yang berkaitan dengan pemberdayaan pemuda, pelaksanaan pentas seni, pembelajaran dan pelatihan kesenian bagi warganya atau pelaksanaan kegiatan olahraga rutin bagi warga masyarakat dalam lingkungan RT dan/atau bekerja sama dengan RW.
      </div>
    </div>
  </div>
</div>
        </div>
        
    </div>
</section>


<!--  Section Services End -->
@endsection

@section('script')
    @if(Session::has('success'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            text: '{{Session::get("success")}}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php
        Session::forget('success');
    ?>
    @endif
    @if(Session::has('error'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            text: '{{Session::get("error")}}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php
        Session::forget('error');
    ?>
    @endif
@endsection