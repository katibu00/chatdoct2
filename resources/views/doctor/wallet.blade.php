@extends('layouts.master')
@section('PageTitle', 'My Wallet')

@section('css')

@endsection
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xl-10">
                <div class="col-xxl-8">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header pt-7">
                            <h4 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">Latest Withdrawal Request</span>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($payments as $key => $payment)
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
                                                    <span
                                                        class="text-dark fw-bolder d-block fs-6">{{ ucfirst($payment->status) }}</span>
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
                <div class="col-xxl-4">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">Summary</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center me-5">
                                    <div class="me-5">
                                        <a href="#"
                                            class="text-gray-800 fw-bolder text-hover-primary fs-6">Accumulated Earnings</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-center">
                                        <span
                                            class="fw-bold fs-7 d-block text-start text-gray-400 ps-0">&#8358;{{ number_format(auth()->user()->balance, 0) }}</span>
                                    </div>
                                </div>
                            </div>
                            @php
                                $query = App\Models\Preferences::find(1);
                                $commision = @$query->commission;
                            @endphp
                            <div class="separator separator-dashed my-4"></div>
                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center me-5">
                                    <div class="me-5">
                                        <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Commission
                                            ({{ $commision }}%)</a>
                                    </div>
                                </div>
                                @php
                                    $commissionRate = $commision/100;
                                    $accumulatedEarnings = auth()->user()->balance;
                                    $commission = $accumulatedEarnings * $commissionRate;
                                    $availableBalance = $accumulatedEarnings - $commission;
                                @endphp
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-center">
                                        <span
                                            class="fw-bold fs-7 d-block text-start text-gray-400 ps-0">&#8358;{{ number_format(@$commission, 0) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-4"></div>
                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center me-5">
                                    <div class="me-5">
                                        <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Available
                                            Balance</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-center">
                                        <span
                                            class="fw-bold fs-7 d-block text-start text-gray-400 ps-0">&#8358;{{ number_format(@$availableBalance, 0) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-4"></div>

                        </div>
                        <div class="card-footer mx-auto pt-0">
                            <a href="#" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_users_search">Request New Withdrawal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->

    <!--begin::Modal - Users Search-->
    <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h1 class="mb-3">Submit New Withdral Request</h1>
                        <div class="text-muted fw-bold fs-5">Withdrawal requests are subject to review and approval by our
                            team.</div>
                    </div>

                    <div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2"
                        data-kt-search-enter="enter" data-kt-search-layout="inline">
                        <form class="w-100 position-relative mb-5" action="{{ route('doctors.wallet.request') }}"
                            method="post">
                            @csrf
                            <input type="number" class="form-control form-control-lg form-control-solid px-15"
                                name="amount" placeholder="Withdrawal Amount" />

                            <div class="modal-footer flex-center">
                                <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
