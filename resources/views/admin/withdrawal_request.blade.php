@extends('layouts.master')
@section('PageTitle', 'Withdrawal Request')

@section('css')

@endsection
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xl-10">
                <div class="col-xxl-12">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header pt-7">
                            <h4 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">Withdrawal Request</span>
                            </h4>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                               @include('admin.withdrawal_table')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end::Post-->
@endsection

@section('js')
<script src="/sweetalert.min.js"></script>

<script>

//delete item
$(document).on('click', '.approve', function(e) {
    e.preventDefault();

    let id = $(this).data('id');
    let name = $(this).data('name');
    swal({
            title: "Approve " + name + "?",
            text: "before you continue, make sure you disbursed the funds!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('withdrawal.approve') }}",
                    method: 'POST',
                    data: {
                        id: id,
                    },

                    success: function(res) {

                        if (res.status == 200) {
                            swal('Approved', res.message, "success");
                            $('.table').load(location.href + ' .table');
                        }

                    }
                });
            }
        });

});
$(document).on('click', '.reject', function(e) {
    e.preventDefault();

    let id = $(this).data('id');
    let name = $(this).data('name');
    swal({
            title: "Reject " + name + "?",
            text: "Rejected Applicants can submit new application!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('withdrawal.reject') }}",
                    method: 'POST',
                    data: {
                        id: id,
                    },

                    success: function(res) {

                        if (res.status == 200) {
                            swal('Rejected', res.message, "success");
                            $('.table').load(location.href + ' .table');
                        }

                    }
                });
            }
        });

});
</script>

@endsection
