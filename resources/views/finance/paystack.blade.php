@extends('layouts.master')

@section('PageTitle', 'Pay with Paystack')

@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Pay Online</h3>
                    </div>
                </div>
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form class="form" id="paymentForm">
                        @csrf
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Amount</span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="amount"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Enter the amount" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="button" class="btn btn-primary" onclick="payWithPaystack()">Proceed to
                                Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->
@endsection

@section('js')
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
       function payWithPaystack() {
    var amount = document.querySelector('[name="amount"]').value.trim(); // Get the amount and remove leading/trailing spaces

    // Check if the amount is empty or not a valid number
    if (amount === "" || isNaN(amount)) {
        // Display validation error using SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Invalid Amount!',
            text: 'Please enter a valid amount before proceeding.',
        });
        return;
    }

    var user_id = '{{ auth()->user()->id }}';

    var handler = PaystackPop.setup({
        key: '{{ $publicKey }}',
        email: '{{ auth()->user()->email }}',
        amount: amount * 100,
        currency: 'NGN',
        metadata: {
            user_id: user_id // Pass the user_id as metadata
        },
        callback: function(response) {
            // Make an AJAX call to your server with the reference to verify the transaction
            var reference = response.reference;
            $.post('/verify-payment', {reference: reference, _token: '{{ csrf_token() }}'}, function(data) {
                if(data.success) {
                    // Display success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Payment Successful!',
                        text: 'Your wallet has been credited.',
                    }).then((result) => {
                        // Reload the page after displaying the message
                        window.location.href = "{{ route('patient.home') }}?message=Payment+successful";
                    });
                } else {
                    // Display failure message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Payment Failed!',
                        text: 'Payment failed or was not verified. Please try again.',
                    });
                }
            });
        },
        onClose: function() {
            // Display message for closed transaction using SweetAlert
            Swal.fire({
                icon: 'warning',
                title: 'Transaction Not Completed!',
                text: 'Transaction was not completed, window closed.',
            });
        },
    });
    handler.openIframe();
}

    </script>

@endsection
