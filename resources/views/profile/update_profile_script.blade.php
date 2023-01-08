<script>
    $(document).ready(function() {
    
        $(document).on('submit', '#update_profile_form', function(e){
            e.preventDefault();
            
            let formData = new FormData($('#update_profile_form')[0]);
    
            spinner = '<div class="spinner-border" style="height: 20px; width: 20px;" role="status"><span class="sr-only">Loading...</span></div> &nbsp;Saving . . .'
                     $('#submit_btn').html(spinner);
                     $('#submit_btn').attr("disabled", true);
   
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                type: "POST",
                url: "{{ route('profile') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                  
                    if(response.status == 400){
                            $('#error_list').html("");
                            $.each(response.errors, function (key, err){
                                $('#error_list').append('<li class="text-danger">'+err+'</li>');
                            });
                            $('#submit_btn').text("Save Changes");
                            $('#submit_btn').attr("disabled", false);
                            Command: toastr["error"]("Some Fields are required. Please check your input and try again.")
    
                            toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
    
                        if(response.status == 200){
                            Command: toastr["success"](response.message)
                            toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }

                            $('#submit_btn').text("Save Changes");
                            $('#submit_btn').attr("disabled", false);
                        }
                }
            })
    
        })
    
    
    });
    </script>