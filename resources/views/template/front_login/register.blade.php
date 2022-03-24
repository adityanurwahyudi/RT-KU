<!DOCTYPE html>
<html lang="en">
<head>
	<title>I-TECH</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="{{ asset('assets_backend/img/favicon.png') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="asset_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="asset_login/css/main.css">
<!--===============================================================================================-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	<style>
		#captcha-register div{
			width: 100%!important;
		}
		.container-register{
		width:750px;
		}
		.form-regis{
			padding: 0.9rem 0.75rem;
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="row wrap-login100 p-l-40 p-r-40 p-t-40 p-b-55 container-register">
				<form id="form-register" class="login100-form validate-form flex-sb flex-w" enctype="multipart/form-data" method="POST" action="{{ route('register.store') }}">
				@csrf
					<span class="login100-form-title p-b-32">
						REGISTER
					</span>
					<div class="col-md-6">
						<span class="txt1 p-b-11">
							Nama
						</span>
						<div class="wrap-input100 validate-input m-b-25" data-validate = "Nama is required">
							<input class="input100 form-regis" type="text" maxlength="250" name="nama" id="nama" placeholder="Nama" onkeypress="return hanyaHuruf(event)">
							<span class="focus-input100"></span>
						</div><br>

						<span class="txt1 p-b-11">
							Email
						</span>
						<div class="wrap-input100 validate-input m-b-0" data-validate = "Email is required">
							<input class="input100 form-regis" type="email" maxlength="250" name="email" id="email" placeholder="Email">
							<span class="focus-input100"></span>
						</div>
						<div class="flex-sb-m w-full">
							<div>
								<span style="font-size:13px;color:red;">*contoh : no-reply@gmail.com</span>
							</div>
						</div><br>

						<span class="txt1 p-b-11">
							Password
						</span>
						<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
							<span class="btn-show-pass">
								<i class="fa fa-eye"></i>
							</span>
							<input class="input100 form-regis" type="password" maxlength="250" name="pw" id="pw" placeholder="Password">
							<span class="focus-input100"></span>
						</div>
					</div>
					<div class="col-md-6">
						<span class="txt1 p-b-11">
							Handphone
						</span>
						<div class="wrap-input100 validate-input m-b-0" data-validate = "Pekerjaan is required">
							<input class="input100 form-regis" type="text" name="telpon" id="telpon" maxlength="14" id="telpon" placeholder="Handphone" onkeypress="return hanyaAngka(event)">
							<span class="focus-input100"></span>
						</div>
						<div class="flex-sb-m w-full">
							<div>
								<span style="font-size:13px;color:red;">*Format max. 14 angka</span>
							</div>
						</div><br>

						<span class="txt1 p-b-11">
							Jenis Kelamin
						</span>
						<div class="wrap-input100 validate-input m-b-25" data-validate = "Pekerjaan is required">
							<select class="input100 form-regis" id="jenis_kelamin" name="jenis_kelamin">
								<option style="display:none;" value="">--Pilih Jenis Kelamin--</option>
								<option value="1">Laki-Laki</option>
								<option value="2">Perempuan</option>
							</select>
							<span class="focus-input100"></span>
						</div><br>

						<span class="txt1 p-b-11">
							Foto
						</span>
						<div class="wrap-input100 validate-input m-b-2" data-validate = "Pekerjaan is required">
							<input class="input100 form-regis" type="file" maxlength="250" name="foto" id="foto" accept=".jpg, .jpeg" onchange="fileValidasi('foto')" required>
							<span class="focus-input100"></span>
						</div>
						<div class="flex-sb-m w-full p-b-48">
							<div>
								<span style="font-size:13px;color:red;">*Format : jpg, jpeg</span>
							</div>
						</div>
					</div>

					<div class="login100-form-title p-b-32">
						<div id="captcha-register"></div>
					</div>

					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="verifyCaptcha(grecaptcha.getResponse(widget))">
							Register
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="asset_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/bootstrap/js/popper.js"></script>
	<script src="asset_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="asset_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="asset_login/js/main.js"></script>

    <script type="text/javascript">
		var verifyCallback = function(response) {
            alert(response);
        }
        var widget;
        var onloadCallback = function() {
            widget = grecaptcha.render('captcha-register', {
                'sitekey': "{{config('captcha.site_key_recaptcha')}}",
                'theme': 'light'
            });
			console.log(widget);
        }

		function hanyaHuruf(event){
            var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
                return false;
            return true;
        }

        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }

        function verifyCaptcha(result) {
			var nama = $('#nama').val();
			var email = $('#email').val();
			var password = $('#pw').val();
			var telpon = $('#telpon').val();
			var jenis_kelamin = $('#jenis_kelamin').val();
			var foto = $('#foto').val();

			if (result !== "") {
				if(nama == ""){
					Swal.fire({
						icon: 'error',
						text: 'Harap isi Nama terlebih dahulu!',
						showConfirmButton: true,
					});
				}else if(email == ""){
					Swal.fire({
						icon: 'error',
						text: 'Harap isi Email terlebih dahulu!',
						showConfirmButton: true,
					});
				}else if(password == ""){
					Swal.fire({
						icon: 'error',
						text: 'Harap isi Password terlebih dahulu!',
						showConfirmButton: true,
					});
				}else if(telpon == ""){
					Swal.fire({
						icon: 'error',
						text: 'Harap isi Telepon terlebih dahulu!',
						showConfirmButton: true,
					});
				}else if(jenis_kelamin == ""){
					Swal.fire({
						icon: 'error',
						text: 'Harap isi Jenis Kelamin terlebih dahulu!',
						showConfirmButton: true,
					});
				}else if(foto == ""){
					Swal.fire({
						icon: 'error',
						text: 'Harap Upload Foto terlebih dahulu!',
						showConfirmButton: true,
					});
				}else{
					$.get("{{URL::to('cek-email')}}",{email:email},function(res){
						if(res == 'ADA'){
							Swal.fire({
								icon: 'info',
								text: 'Email Tersebut Sudah Terdaftar !',
								showConfirmButton: false,
								timer: 1500
							});
						}else{
							$('#form-register').submit();
						}
					})
				}
            } else {
                Swal.fire({
                    icon: 'error',
                    text: 'Harap isi Captcha terlebih dahulu!',
                    showConfirmButton: true,
                });
            }
		}

		function fileValidasi(id) {
			var fileInput = document.getElementById(id);
			var file = fileInput.files[0];
			var filePath = fileInput.value;
        	var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
			if (!allowedExtensions.exec(filePath)) {
				Swal.fire(
					'Format File Tidak Sesuai !',
                	'Please upload file having extensions .jpg/.jpeg/.png only.',
					'info'
				)
				fileInput.value = '';
				return false;
			} else {
				if (file.size >= 10485760) { //10mb
					Swal.fire(
						'Size File Terlalu Besar !',
						'File '+ file.name +'is'+ file.size +' bytes in size',
						'info'
					)
					fileInput.value = '';
					return false;
				}
			}
		}
	</script>
	@if(Session::has('success'))
		<script type="text/javascript">
			Swal.fire({
				icon: 'success',
				title: 'Berhasil Registrasi, Silahkan Login',
				showCancelButton: false,
				confirmButtonText: "OK",
			}).then(function(result) {
				if(result.value){
					window.location.href = "{{ URL::to('/login')}}";
				}
			})
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
</body>
</html>