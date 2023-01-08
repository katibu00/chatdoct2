@extends('layouts.master')
@section('PageTitle', 'Login Logs')

@section('css')
    <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">

                    </div>
                </div>

                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                
                                <th class="min-w-25px">S/N</th>
                                <th class="min-w-125px">NAME</th>
                                <th class="min-w-125px">ROLE</th>
                                <th class="min-w-125px">TIME</th>
                               
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 fw-bold">

                            @foreach ($logs as $key => $log)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                       {{  $log->user->role == 'doctor'? 'Dr. '.$log->user->first_name.' '. $log->user->middle_name.' '. $log->user->last_name : $log->user->first_name.' '. $log->user->middle_name.' '. $log->user->last_name }}
                                    </td>
                                    <td>
                                       {{ $log->user->role }}
                                    </td>

                                  
                                    <td> {{ $log->created_at->diffForHumans() }}</td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->

@endsection

@section('js')
    <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="/assets/js/custom/apps/user-management/users/list/table.js"></script>
    <script src="/assets/js/custom/apps/subscriptions/list/export.js"></script>
    <script src="/assets/js/custom/apps/subscriptions/list/list.js"></script>
    <script src="/assets/js/custom/widgets.js"></script>
@endsection
