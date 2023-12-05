<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>ChatDoc - Login</title>
		<meta name="description" content="Chatdoc is a social enterprise that helps underserviced communities in Nigeria to access qualitative healthcare virtually through Telemedicine." />
		<meta name="keywords" content="chatdoc, chat a doctor, doctor, chatting with a doctor, telemedicine, " />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<meta property="og:url" content="https://chatdoct.com" />
		<meta property="og:site_name" content="ChatDoct | Chatdoc" />
		<link rel="shortcut icon" href="/uploads/logo.jpg" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/14.png">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="" class="mb-12">
						<img alt="Logo" src="/uploads/logo.png" class="h-40px" />
					</a>
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" id="login_form">
                            @csrf
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Sign In to ChatDoc</h1>
								<div class="text-gray-400 fw-bold fs-4">New Here?
								<a href="{{route('register')}}" class="link-primary fw-bolder">Create an Account</a></div>
							</div>
							@if (session('registered'))
							<h3 style="color: white; background: green; padding: 5px;">{{session('registered')}}</h3>
							@endif
							@if(session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
							@endif
							<ul id="error_list"></ul>
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Email/User ID</label>
								<input class="form-control form-control-lg form-control-solid" type="email" name="email" id="email" autocomplete="email" autofocus />
							</div>
							
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<div class="mb-1">
									<div class="d-flex flex-stack mb-2">
										<!--begin::Label-->
										<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
										<a href="{{ route('password.forgot') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
										<!--end::Link-->
									</div>
									<div class="position-relative mb-3">
                                        <input id="password" type="password" class="form-control form-control-lg form-control-solid" placeholder="Enter Password" name="password">
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
										<label class="form-check-label mt-2" for="remember">
											Remember Me
										  </label>
										  <input class="form-check-input mt-1" type="checkbox" name="remember" id="remember">
									</div>
								</div>
							</div>

							<!--end::Input group-->
								<input type="hidden" name="number" value="{{@$number}}"/>
							<!--begin::Actions-->
							<div class="text-center">
								<button type="submit"  class="btn btn-lg btn-primary login_btn">
									<span class="indicator-label">Login</span>
								</button>
							</div>
							<!--end::Actions-->
						</form>
					</div>
					<!--end::Wrapper-->
				</div>
				<div class="d-flex flex-center flex-column-auto p-10">
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="https://chatdoct.com" class="text-muted text-hover-primary px-2">Home</a>
						<a href="{{route('about')}}" class="text-muted text-hover-primary px-2">About</a>
						<a href="{{route('contact')}}" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
				</div>
			</div>
		</div>
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>
		<script>
			$(document).ready(function () {
		$(document).on("submit", "#login_form", function (e) {
			e.preventDefault();
			var data = {
				email: $("#email").val(),
				password: $("#password").val(),
				remember: $("#remember").prop("checked") == true ? 1 : 0,
			};
		
			spinner =
				'<div class="spinner-border" style="height: 20px; width: 20px;" role="status"></div><span class="indicator-label"> &nbsp;Submitting . . .</span>';
			$(".login_btn").html(spinner);
			$(".login_btn").attr("disabled", true);
			// console.log(data); return;
			$.ajaxSetup({
				headers: {
					"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				},
			});
			$.ajax({
				type: "POST",
				url: "/login",
				data: data,
				dataType: "json",
				success: function (response) {
					if (response.status == 400) {
						$("#error_list").html("");
						$.each(response.errors, function (key, err) {
							$("#error_list").append("<li class='text-danger'>" + err + "</li>");
						});
						$(".login_btn").text("Login");
						$(".login_btn").attr("disabled", false);
					}
					if (response.status == 401) {
						$("#error_list").html("");
						$("#error_list").append('<li class="text-danger">' + response.message + '</li>');
						$(".login_btn").text("Login");
						$(".login_btn").attr("disabled", false);
					}
					if (response.status == 200) {
						$("#error_list").html("");
						$("#error_list").addClass("alert alert-success");
						$("#error_list").append(
							"<li>Login Successful. Redirecting to Dashboard. . .</li>"
						);
	
						if(response.user == 'admin'){
							window.location.replace('{{ route('admin.home') }}');
						}
						if(response.user == 'patient'){
							window.location.replace('{{ route('patient.home') }}');
						}
						if(response.user == 'doctor'){
							window.location.replace('{{ route('doctor.home') }}');
						}
					
						
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					if (xhr.status === 419) {
						Command: toastr["error"](
							"Session expired. please login again."
						);
						toastr.options = {
							closeButton: false,
							debug: false,
							newestOnTop: false,
							progressBar: false,
							positionClass: "toast-top-right",
							preventDuplicates: false,
							onclick: null,
							showDuration: "300",
							hideDuration: "1000",
							timeOut: "5000",
							extendedTimeOut: "1000",
							showEasing: "swing",
							hideEasing: "linear",
							showMethod: "fadeIn",
							hideMethod: "fadeOut",
						};
	
						setTimeout(() => {
							   window.location.replace('{{ route('login') }}');
						}, 2000);
					}
				},
			});
		});
	});
	
		</script>

	</body>
	<!--end::Body-->
</html>
