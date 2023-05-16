@extends('layouts.master')
@section('PageTitle', 'Latest Deposit Alerts')

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
                                            <th class="p-0 min-w-55px">S/N</th>
                                            <th class="p-0 mi1n-w-175px">User</th>
                                            <th class="p-0 min-w-175px">Amount</th>
                                            <th class="p-0 min-w-150px">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($deposits as $key => $payment)
                                            <tr>
                                                <td class="ps-0">
                                                    <a href="#"
                                                        class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $key + 1 }}</a>
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bolder d-block fs-6">
                                                        {{ @$payment->user->first_name . ' ' . @$payment->user->middle_name . ' ' . @$payment->user->last_name }}</span>
                                                </td>
                                               
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder d-block fs-6">&#8358;{{ number_format($payment->amount, 0) }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-dark fw-bolder d-block fs-6">{{ $payment->created_at->diffForHumans() }}</span>
                                                </td>
                                               
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No Recent Deposits</td>
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
@endsection
