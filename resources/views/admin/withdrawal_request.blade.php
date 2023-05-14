@extends('layouts.master')
@section('PageTitle', 'My Wallet')

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
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <thead>
                                        <tr class="border-bottom-0">
                                            <th class="p-0 min-w-175px">S/N</th>
                                            <th class="p-0 min-w-175px">Date</th>
                                            <th class="p-0 min-w-175px">Amount</th>
                                            <th class="p-0 min-w-150px">Status</th>
                                            <th class="p-0 min-w-150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($requests as $key => $payment)
                                            <tr>
                                                <td class="ps-0">
                                                    <a href="#"
                                                        class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $key + 1 }}</a>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder d-block fs-6">{{ $payment->created_at->diffForHumans() }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder d-block fs-6">&#8358;{{ number_format($payment->amount, 0) }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder d-block fs-6">
                                                        @if ($payment->status == 'pending')
                                                            <span class="badge badge-warning">Pending</span>
                                                        @elseif($payment->status == 'approved')
                                                            <span class="badge badge-success">Approved</span>
                                                        @elseif($payment->status == 'rejected')
                                                            <span class="badge badge-danger">Rejected</span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Actions
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <a class="menu-link px-3" data-bs-toggle="modal"
                                                                data-bs-target="#details">Acc. Details</a>
                                                            <a class="menu-link px-3">Approve</a>
                                                            <a class="menu-link px-3">Reject</a>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No Recent Requests</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end::Post-->

    <div class="modal fade" id="details" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h1 class="mb-3">lllll</h1>

                        <div class="text-muted fw-bold fs-5">pppp</div>
                    </div>


                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-35px symbol-circle">
                            </div>

                            <div class="ms-6">
                                <a class="d-flex align-items-center fs-5 fw-bolder ">Gender:
                                    <span class="text-dark text-hover-primary"> &nbsp;
                                        male</span></a>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="text-end">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="d-flex flex-center flex-row-fluid pt-5">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>

@endsection
