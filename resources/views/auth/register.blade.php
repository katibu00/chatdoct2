<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>ChatDoc - Create an Account</title>
		<meta name="description" content="Chatdoc is a social enterprise that helps underserviced communities in Nigeria to access qualitative healthcare virtually through Telemedicine." />
		<meta name="keywords" content="chatdoc, chat a doctor, doctor, chatting with a doctor, telemedicine, " />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<meta property="og:url" content="https://chatdoct.com" />
		<meta property="og:site_name" content="ChatDoct | Chatdoc" />
		<link rel="shortcut icon" href="/uploads/logo.jpg" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/14.png">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="#" class="mb-12">
						<img alt="Logo" src="/uploads/logo.png" class="h-40px" />
					</a>
					<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" id="register_form">
                            @csrf
							<div class="mb-10 text-center">
								<h1 class="text-dark mb-3">Create an Account</h1>
								<div class="text-gray-400 fw-bold fs-4">Already have an account?
								<a href="{{route('login')}}" class="link-primary fw-bolder">Sign in here</a></div>
							</div>
							<ul id="error_list"></ul>
							<div class="row fv-row mb-7">
								<div class="col-xl-4">
									<label class="form-label fw-bolder text-dark fs-6">First Name</label>
									<input class="form-control form-control-lg form-control-solid" type="text" id="first_name" placeholder="First or Given Name" name="first_name" />
								</div>
								<div class="col-xl-4">
									<label class="form-label fw-bolder text-dark fs-6">Middle Name</label>
									<input class="form-control form-control-lg form-control-solid" type="text" id="middle_name" placeholder="Middle Name" name="middle_name" />
								</div>
								<div class="col-xl-4">
									<label class="form-label fw-bolder text-dark fs-6">Last Name</label>
									<input class="form-control form-control-lg form-control-solid" type="text" id="last_name" placeholder="Last or Surname Name" name="last_name" />
								</div>
							</div>
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input id="email" type="email" class="form-control form-control-lg form-control-solid" name="email" placeholder="Enter your Email">
							</div>
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Phone Number</label>
                                <input id="email" type="tel" class="form-control form-control-lg form-control-solid" name="phone" placeholder="Enter your Phone Number">
							</div>
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<div class="mb-1">
									<label class="form-label fw-bolder text-dark fs-6">Password</label>
									<div class="position-relative mb-3">
                                        <input id="password" type="password" class="form-control form-control-lg form-control-solid" placeholder="Enter Password" name="password">
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
								</div>
								<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
							</div>
							<div class="fv-row mb-5">
								<label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation">
							</div>
							<div class="text-center">
								<button type="submit"  class="btn btn-lg btn-primary submit_btn">
									<span class="indicator-label">Submit</span>
								</button>
							</div>
						</form>
					</div>
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
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		
		<script>
			$(document).ready(function () {
				$(document).on("submit", "#register_form", function (e) {
					e.preventDefault();
					
					let formData = new FormData($('#register_form')[0]);
				
					spinner =
						'<div class="spinner-border" style="height: 20px; width: 20px;" role="status"></div><span class="indicator-label"> &nbsp;Submitting . . .</span>';
					$(".submit_btn").html(spinner);
					$(".submit_btn").attr("disabled", true);
					// console.log(data); return;
					$.ajaxSetup({
						headers: {
							"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
						},
					});
					$.ajax({
						type: "POST",
						url: "/register",
						data: formData,
						contentType: false,
            		    processData: false,
						success: function(response){
                  
							if(response.status == 400){
									$('#error_list').html("");
									$.each(response.errors, function (key, err){
										$("#error_list").append("<li class='text-danger'>" + err + "</li>");
									});
									$('.submit_btn').text("Submit");
									$('.submit_btn').attr("disabled", false);
									Command: toastr["error"]("Some Fields are required. Please check your input and try again.")
									
								}
			
								if(response.status == 200){
									Command: toastr["success"](response.message)
									
									window.location.replace('{{ route('login') }}');

								}
								if(response.status == 500){
									Command: toastr["error"](response.message)
									$('.submit_btn').text("Submit");
									$('.submit_btn').attr("disabled", false);

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
