<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>ChatDoc - Create an Account</title>
    <meta name="description"
        content="Chatdoc is a social enterprise that helps underserviced communities in Nigeria to access qualitative healthcare virtually through Telemedicine." />
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
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(assets/media/14.png">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="#" class="mb-12">
                    <img alt="Logo" src="/uploads/logo.png" class="h-40px" />
                </a>
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100" action="{{ route('doctor.register') }}" method="POST">
                        @csrf
                        <div class="mb-10 text-center">
                            <h1 class="text-dark mb-3">Doctor Registration</h1>
                            <div class="text-gray-400 fw-bold fs-4">
                                Already have an account?
                                <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a>
                            </div>
                        </div>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                        <!-- First Name and Last Name -->
						<div class="row fv-row mb-7">
							<div class="col-xl-6">
								<label class="form-label fw-bolder text-dark fs-6">First Name</label>
								<input class="form-control form-control-lg form-control-solid @error('first_name') is-invalid @enderror"
									type="text" id="first_name" placeholder="First or Given Name" name="first_name"
									value="{{ old('first_name') }}" />
								@error('first_name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
					
							<div class="col-xl-6">
								<label class="form-label fw-bolder text-dark fs-6">Last Name</label>
								<input class="form-control form-control-lg form-control-solid @error('last_name') is-invalid @enderror"
									type="text" id="last_name" placeholder="Last or Surname Name" name="last_name"
									value="{{ old('last_name') }}" />
								@error('last_name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
						</div>

                        <!-- Email and Phone Number -->
                        <div class="fv-row mb-7">
							<label class="form-label fw-bolder text-dark fs-6">Email</label>
							<input id="email" type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
								name="email" placeholder="Enter your Email" value="{{ old('email') }}">
							@error('email')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						
						<div class="fv-row mb-7">
							<label class="form-label fw-bolder text-dark fs-6">Phone Number</label>
							<input id="phone" type="tel" class="form-control form-control-lg form-control-solid @error('phone') is-invalid @enderror"
								name="phone" placeholder="Enter your Phone Number" value="{{ old('phone') }}">
							@error('phone')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						

                        <!-- Additional Fields from Old Form -->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Rank</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Select Rank" name="rank">
                                <option value=""></option>
                                <option value="Professor">Professor</option>
                                <option value="Consultant">Consultant</option>
                                <option value="Resident Doctor">Resident Doctor</option>
                                <option value="Medical Officer">Medical Officer</option>
                            </select>
                            @error('rank')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

						<div class="fv-row mb-7">
							<label class="form-label fw-bolder text-dark fs-6">Specialities</label>
							<select class="form-select form-select-solid @error('speciality') is-invalid @enderror" data-control="select2" multiple
								data-hide-search="false" data-placeholder="Select Specialities" name="speciality[]">
								<option value=""></option>
								<option value="General Practitioner" {{ in_array('General Practitioner', old('speciality', [])) ? 'selected' : '' }}>General Practitioner</option>
								<option value="General Surgery" {{ in_array('General Surgery', old('speciality', [])) ? 'selected' : '' }}>General Surgery</option>
								<option value="Dermotology" {{ in_array('Dermotology', old('speciality', [])) ? 'selected' : '' }}>Dermotology</option>
								<option value="Immunology" {{ in_array('Immunology', old('speciality', [])) ? 'selected' : '' }}>Immunology</option>
								<option value="Radiology" {{ in_array('Radiology', old('speciality', [])) ? 'selected' : '' }}>Radiology</option>
								<option value="Family Medicine" {{ in_array('Family Medicine', old('speciality', [])) ? 'selected' : '' }}>Family Medicine</option>
								<option value="Internal Medicine" {{ in_array('Internal Medicine', old('speciality', [])) ? 'selected' : '' }}>Internal Medicine</option>
								<option value="Neurology" {{ in_array('Neurology', old('speciality', [])) ? 'selected' : '' }}>Neurology</option>
								<option value="Cardiology" {{ in_array('Cardiology', old('speciality', [])) ? 'selected' : '' }}>Cardiology</option>
								<option value="Obstetrics" {{ in_array('Obstetrics', old('speciality', [])) ? 'selected' : '' }}>Obstetrics</option>
								<option value="Gynacology" {{ in_array('Gynacology', old('speciality', [])) ? 'selected' : '' }}>Gynacology</option>
								<option value="Opthalmology" {{ in_array('Opthalmology', old('speciality', [])) ? 'selected' : '' }}>Opthalmology</option>
								<option value="Haematology" {{ in_array('Haematology', old('speciality', [])) ? 'selected' : '' }}>Haematology</option>
								<option value="Paediatrics" {{ in_array('Paediatrics', old('speciality', [])) ? 'selected' : '' }}>Paediatrics</option>
								<option value="Psychiatrics" {{ in_array('Psychiatrics', old('speciality', [])) ? 'selected' : '' }}>Psychiatrics</option>
								<option value="Rheumatology" {{ in_array('Rheumatology', old('speciality', [])) ? 'selected' : '' }}>Rheumatology</option>
								<option value="Oncology" {{ in_array('Oncology', old('speciality', [])) ? 'selected' : '' }}>Oncology</option>
								<option value="Urology" {{ in_array('Urology', old('speciality', [])) ? 'selected' : '' }}>Urology</option>
								<option value="Radiology" {{ in_array('Radiology', old('speciality', [])) ? 'selected' : '' }}>Radiology</option>
								<option value="Endocrinolgy" {{ in_array('Endocrinolgy', old('speciality', [])) ? 'selected' : '' }}>Endocrinolgy</option>
								<option value="Orthopaedics" {{ in_array('Orthopaedics', old('speciality', [])) ? 'selected' : '' }}>Orthopaedics</option>
								<option value="Plastic Surgery" {{ in_array('Plastic Surgery', old('speciality', [])) ? 'selected' : '' }}>Plastic Surgery</option>
								<option value="Gastroenterology" {{ in_array('Gastroenterology', old('speciality', [])) ? 'selected' : '' }}>Gastroenterology</option>
								<option value="Dental Surgery" {{ in_array('Dental Surgery', old('speciality', [])) ? 'selected' : '' }}>Dental Surgery</option>
								<option value="Maxillofacial surgery" {{ in_array('Maxillofacial surgery', old('speciality', [])) ? 'selected' : '' }}>Maxillofacial surgery</option>
								<option value="ENT" {{ in_array('ENT', old('speciality', [])) ? 'selected' : '' }}>ENT</option>
								<option value="Nephrology" {{ in_array('Nephrology', old('speciality', [])) ? 'selected' : '' }}>Nephrology</option>
							</select>
							@error('speciality')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						

						<div class="fv-row mb-7">
							<!-- Contact Phone -->
							<label class="form-label fw-bolder text-dark fs-6">Contact Phone</label>
							<input type="tel" class="form-control form-control-lg form-control-solid @error('contact_phone') is-invalid @enderror"
								name="contact_phone" placeholder="Enter Contact Phone" value="{{ old('contact_phone') }}">
							@error('contact_phone')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						
						<div class="fv-row mb-7">
							<!-- Years of Experience -->
							<label class="form-label fw-bolder text-dark fs-6">Years of Experience</label>
							<input type="text" class="form-control form-control-lg form-control-solid @error('experience') is-invalid @enderror"
								name="experience" placeholder="Enter Years of Experience" value="{{ old('experience') }}">
							@error('experience')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						

                        <div class="fv-row mb-7">
							<!-- Languages -->
							<label class="form-label fw-bolder text-dark fs-6">Languages</label>
							<select class="form-select form-select-solid @error('languages') is-invalid @enderror" data-control="select2"
								multiple data-hide-search="false" data-placeholder="Select Languages" name="languages[]">
								<option value=""></option>
								<option value="English" {{ in_array('English', old('languages', [])) ? 'selected' : '' }}>English</option>
								<option value="Pidgin" {{ in_array('Pidgin', old('languages', [])) ? 'selected' : '' }}>Pidgin</option>
								<option value="Hausa" {{ in_array('Hausa', old('languages', [])) ? 'selected' : '' }}>Hausa</option>
								<option value="Yoruba" {{ in_array('Yoruba', old('languages', [])) ? 'selected' : '' }}>Yoruba</option>
								<option value="Igbo" {{ in_array('Igbo', old('languages', [])) ? 'selected' : '' }}>Igbo</option>
								<option value="Fulfulde" {{ in_array('Fulfulde', old('languages', [])) ? 'selected' : '' }}>Fulfulde</option>
								<option value="Tiv" {{ in_array('Tiv', old('languages', [])) ? 'selected' : '' }}>Tiv</option>
								<option value="Kanuri" {{ in_array('Kanuri', old('languages', [])) ? 'selected' : '' }}>Kanuri</option>
								<option value="Ibibio" {{ in_array('Ibibio', old('languages', [])) ? 'selected' : '' }}>Ibibio</option>
							</select>
							@error('languages')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						

						<div class="fv-row mb-7">
							<!-- Folio Number -->
							<label class="form-label fw-bolder text-dark fs-6">Folio Number</label>
							<input type="text" class="form-control form-control-lg form-control-solid @error('folio') is-invalid @enderror"
								name="folio" placeholder="Enter Folio Number" value="{{ old('folio') }}">
							@error('folio')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						
						<div class="fv-row mb-7">
							<!-- Sex -->
							<label class="form-label fw-bolder text-dark fs-6">Sex</label>
							<select name="sex" class="form-select form-select-solid form-select-lg @error('sex') is-invalid @enderror">
								<option value=""></option>
								<option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
								<option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
							</select>
							@error('sex')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						
						<div class="fv-row mb-7">
							<!-- Address -->
							<label class="form-label fw-bolder text-dark fs-6">Address</label>
							<textarea name="address"
								class="form-control form-control-lg form-control-solid @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
							@error('address')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						

                        <div class="fv-row mb-7">
                            <!-- State and LGA -->
                            <label class="form-label fw-bolder text-dark fs-6">State and LGA</label>
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <select onchange="toggleLGA(this);" name="state" id="state"
                                        class="form-select form-select-solid" data-placeholder="Select State"
                                        data-control="select2">
                                        <option value="" selected="selected">- Select State-</option>
                                        <option value="Abia" @if (@$user->state == 'Abia') selected @endif>
                                            Abia</option>
                                        <option value="Adamawa" @if (@$user->state == 'Adamawa') selected @endif>
                                            Adamawa</option>
                                        <option value="AkwaIbom" @if (@$user->state == 'AkwaIbom') selected @endif>
                                            AkwaIbom</option>
                                        <option value="Anambra" @if (@$user->state == 'Anambra') selected @endif>
                                            Anambra</option>
                                        <option value="Bauchi" @if (@$user->state == 'Bauchi') selected @endif>
                                            Bauchi</option>
                                        <option value="Bayelsa" @if (@$user->state == 'Bayelsa') selected @endif>
                                            Bayelsa</option>
                                        <option value="Benue" @if (@$user->state == 'Benue') selected @endif>
                                            Benue</option>
                                        <option value="Borno" @if (@$user->state == 'Borno') selected @endif>
                                            Borno</option>
                                        <option value="Cross River" @if (@$user->state == 'Cross River') selected @endif>
                                            Cross River</option>
                                        <option value="Delta" @if (@$user->state == 'Delta') selected @endif>
                                            Delta</option>
                                        <option value="Ebonyi" @if (@$user->state == 'Ebonyi') selected @endif>
                                            Ebonyi</option>
                                        <option value="Edo" @if (@$user->state == 'Edo') selected @endif>
                                            Edo</option>
                                        <option value="Ekiti" @if (@$user->state == 'Ekiti') selected @endif>
                                            Ekiti</option>
                                        <option value="Enugu" @if (@$user->state == 'Enugu') selected @endif>
                                            Enugu</option>
                                        <option value="FCT" @if (@$user->state == 'FCT') selected @endif>
                                            FCT</option>
                                        <option value="Gombe" @if (@$user->state == 'Gombe') selected @endif>
                                            Gombe</option>
                                        <option value="Imo" @if (@$user->state == 'Imo') selected @endif>
                                            Imo</option>
                                        <option value="Jigawa" @if (@$user->state == 'Jigawa') selected @endif>
                                            Jigawa</option>
                                        <option value="Kaduna" @if (@$user->state == 'Kaduna') selected @endif>
                                            Kaduna</option>
                                        <option value="Kano" @if (@$user->state == 'Kano') selected @endif>
                                            Kano</option>
                                        <option value="Katsina" @if (@$user->state == 'Katsina') selected @endif>
                                            Katsina</option>
                                        <option value="Kebbi" @if (@$user->state == 'Kebbi') selected @endif>
                                            Kebbi</option>
                                        <option value="Kogi" @if (@$user->state == 'Kogi') selected @endif>
                                            Kogi</option>
                                        <option value="Kwara" @if (@$user->state == 'Kwara') selected @endif>
                                            Kwara</option>
                                        <option value="Lagos" @if (@$user->state == 'Lagos') selected @endif>
                                            Lagos</option>
                                        <option value="Nasarawa" @if (@$user->state == 'Nasarawa') selected @endif>
                                            Nasarawa</option>
                                        <option value="Niger" @if (@$user->state == 'Niger') selected @endif>
                                            Niger</option>
                                        <option value="Ogun" @if (@$user->state == 'Ogun') selected @endif>
                                            Ogun</option>
                                        <option value="Ondo" @if (@$user->state == 'Ondo') selected @endif>
                                            Ondo</option>
                                        <option value="Osun" @if (@$user->state == 'Osun') selected @endif>
                                            Osun</option>
                                        <option value="Oyo" @if (@$user->state == 'Oyo') selected @endif>
                                            Oyo</option>
                                        <option value="Plateau" @if (@$user->state == 'Plateau') selected @endif>
                                            Plateau</option>
                                        <option value="Rivers" @if (@$user->state == 'Rivers') selected @endif>
                                            Rivers</option>
                                        <option value="Sokoto" @if (@$user->state == 'Sokoto') selected @endif>
                                            Sokoto</option>
                                        <option value="Taraba" @if (@$user->state == 'Taraba') selected @endif>
                                            Taraba</option>
                                        <option value="Yobe" @if (@$user->state == 'Yobe') selected @endif>
                                            Yobe</option>
                                        <option value="Zamfara @if (@$user->state == 'Zamfara') selected @endif">
                                            Zamfara</option>
                                    </select>
                                    @error('state')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 fv-row">
                                    <select name="lga" id="lga"
                                        class="form-select form-select-solid select-lga" data-placeholder="LGA"
                                        data-control="select2">
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                <div class="position-relative mb-3">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Enter Password" name="password">
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="d-flex align-items-center mb-3"
                                    data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>
                            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp;
                                symbols.</div>
                        </div>
                        <div class="fv-row mb-5">
                            <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                            <input id="password-confirm" type="password"
                                class="form-control form-control-lg form-control-solid" name="password_confirmation">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary submit_btn">
                                <span class="indicator-label">Submit</span>
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p class="text-muted">Want to register as a patient?
                            <a href="{{ route('register') }}" class="link-primary fw-bolder">Click here</a>
                        </p>
                    </div>
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
    <!--end::Main-->
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/js/scripts.bundle.js"></script>
    <script src="/lga/lga2.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on("submit", "#register_form", function(e) {
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
                    success: function(response) {

                        if (response.status == 400) {
                            $('#error_list').html("");
                            $.each(response.errors, function(key, err) {
                                $("#error_list").append("<li class='text-danger'>" +
                                    err + "</li>");
                            });
                            $('.submit_btn').text("Submit");
                            $('.submit_btn').attr("disabled", false);
                            Command: toastr["error"](
                                "Some Fields are required. Please check your input and try again."
                                )

                        }

                        if (response.status == 200) {
                            Command: toastr["success"](response.message)

                            window.location.replace('{{ route('login') }}');

                        }
                        if (response.status == 500) {
                            Command: toastr["error"](response.message)
                            $('.submit_btn').text("Submit");
                            $('.submit_btn').attr("disabled", false);

                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        if (xhr.status === 419) {
                            Command: toastr["error"](
                                "Session expired. please login again."
                            );

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
