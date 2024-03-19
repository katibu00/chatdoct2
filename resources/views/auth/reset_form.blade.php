<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
        <title>ChatDoc - Reset Password</title>
        <meta name="description"
            content="Chatdoc is a social enterprise that helps underserviced communities in Nigeria to access qualitative healthcare virtually through Telemedicine." />
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
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - New password -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="#" class="mb-12">
						<img alt="Logo" src="/uploads/logo.png" class="h-40px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100"  id="new_password_form">
                            <input type="hidden" id="token" value="{{ @$token }}" />
                            <input type="hidden" id="email" value="{{ @$email }}" />
                            <div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Setup New Password</h1>
								<div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
								<a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a></div>
								<!--end::Link-->
							</div>
                            <ul id="error_list"></ul>
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<div class="mb-1">
									<label class="form-label fw-bolder text-dark fs-6">Password</label>
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" id="password" autocomplete="off" />
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
									</div>
									<!--end::Meter-->
								</div>
								<div class="text-muted">Use 6 or more characters.</div>
								<!--end::Hint-->
							</div>
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" id="password_confirmation" autocomplete="off" />
							</div>
							
							<div class="text-center">
								<button type="submit" id="submit_btn" class="btn btn-lg btn-primary fw-bolder">
									<span class="indicator-label">Reset Password</span>
								</button>
							</div>
						</form>
					</div>
				</div>
				<div class="d-flex flex-center flex-column-auto p-10">
                    <div class="d-flex align-items-center fw-bold fs-6">
                        <a href="https://chatdoct.com" class="text-muted text-hover-primary px-2">Home</a>
                        <a href="{{ route('about') }}" class="text-muted text-hover-primary px-2">About</a>
                        <a href="{{ route('contact') }}" class="text-muted text-hover-primary px-2">Contact Us</a>
                    </div>
				</div>
			</div>
		</div>
		
		<script>var hostUrl = "assets/";</script>
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>

        <script>
            $(document).ready(function() {
                $(document).on("submit", "#new_password_form", function(e) {
                    e.preventDefault();
                    var data = {
                        email: $("#email").val(),
                        token: $("#token").val(),
                        password: $("#password").val(),
                        password_confirmation: $("#password_confirmation").val(),
                    };
    
                    spinner =
                        '<div class="spinner-border" style="height: 20px; width: 20px;" role="status"></div><span class="indicator-label"> &nbsp;Submitting . . .</span>';
                    $("#submit_btn").html(spinner);
                    $("#submit_btn").attr("disabled", true);
                   
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ route('reset.password.reset') }}",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 400) {
                                $("#error_list").html("");
                                $.each(response.errors, function(key, err) {
                                    $("#error_list").append("<li class='text-danger'>" +
                                        err + "</li>");
                                });
                                $("#submit_btn").text("Submit");
                                $("#submit_btn").attr("disabled", false);
                            }
                           
                            if (response.status == 200) {
                                $("#error_list").html("");
                                Command: toastr["success"](response.message);
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
                                $("#password").val("");
                                $("#password_confirmation").val("");
                                $("#submit_btn").text("Submit");
                                $("#submit_btn").attr("disabled", false);
                                window.location.replace('{{ route('login') }}');
    
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
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
</html>