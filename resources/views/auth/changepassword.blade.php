<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../">
    <title>ChatDoc - Forgot Password</title>
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

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="#" class="mb-12">
                    <img alt="Logo" src="/uploads/logo.png" class="h-40px" />
                </a>
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100" id="password_reset_form">
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Forgot Password ?</h1>
                            <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
                        </div>
                        <ul id="error_list"></ul>
                        <div class="fv-row mb-10">
                            <label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
                            <input class="form-control form-control-solid" type="email" placeholder="" id="email" autocomplete="off" />
                        </div>
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit" id="submit_btn" class="btn btn-lg btn-primary fw-bolder me-4">
                                <span class="indicator-label">Submit</span>
                            </button>
                            <a href="{{ route('homepage') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
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

    <script>
        var hostUrl = "assets/";
    </script>
    <script src="/assets/plugins/global/plugins.bundle.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on("submit", "#password_reset_form", function(e) {
                e.preventDefault();
                var data = {
                    email: $("#email").val(),
                };

                spinner =
                    '<div class="spinner-border" style="height: 20px; width: 20px;" role="status"></div><span class="indicator-label"> &nbsp;Submitting . . .</span>';
                $("#submit_btn").html(spinner);
                $("#submit_btn").attr("disabled", true);
                // console.log(data); return;
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('password.forgot') }}",
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
                            $("#email").val("");
                            $("#submit_btn").text("Submit");
                            $("#submit_btn").attr("disabled", false);

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
<!--end::Body-->

</html>
