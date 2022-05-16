@extends('template.frontend.main')

@section('css')

@endsection

@section('content'
)<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>
<style>/* Style the Image Used to Trigger the Modal */
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<section class="page-title bg-galeri2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Galeri Kegiatan</span>
                    <h1 class="text-capitalize mb-4 text-lg">Galeri</h1>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- section portfolio start -->
<section class="section portfolio pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">Foto</span>
                    <h2 class="mt-3 content-title ">Foto-Foto Kegiatan</h2>
                </div>
            </div>
        </div>

        <div class="row">
        @foreach($foto as $p)
    <div class="responsive">
        <div class="img">
            <img src="{{asset('upload/foto/'.$p->gambar)}}" width="50" height="50">
        </div>
    </div>
                        @endforeach
        </div>
        
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 text-center">
                <nav class="navigation pagination d-inline-block">
                    <div class="nav-links">
                    {{ $foto->links() }}
                    </div>
                </nav>
            </div>
        </div> 
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">×</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    </div>
</section>
          

</section>

    <!-- Section Testimonial Start -->
    <section class="section testimonial">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">Video</span>
                    <h2 class="mt-3 content-title ">Video Kegiatan</h2>
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row testimonial-wrap">
                    @foreach($video as $p)
                    <div class="col-lg-4 responsive">
                        <div class="card">
                            <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="{{ $p->URLVideo }}" allowfullscreen></iframe>
</div>
                            <center>
                                <h4 class="card-title">{{ $p->nama }}</h4>
                            </center>
                        </div>
                    </div>
                        @endforeach
            </div>
        </div>
    </section>

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

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";

}</script>
<script>
    $('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 100],
    pageSize: 8,
    formatResult: function(data) {
        var result = [];
        for (var i = 0, len = data.length; i < len; i++) {
            result.push(data[i] + ' - good guys');
        }
        return result;
    },
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})
</script>
@endsection