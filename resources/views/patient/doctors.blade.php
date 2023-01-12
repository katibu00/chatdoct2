@extends('layouts.master')
@section('PageTitle','Doctors')

@section('css')
<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')



    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="d-flex flex-wrap flex-stack mb-6">
                <h3 class="fw-bolder my-2">Featured Doctors</h3>
            </div>
            <div class="row g-6 mb-6 g-xl-9 mb-xl-9">
                @php
                    $hour = date("H");
                    $time = '';
                    if ($hour >= "6" && $hour < "12") {
                        $time = "Morning";
                    } else
                    if ($hour >= "12" && $hour < "18") {
                        $time = "Noon";
                    } else
                    if ($hour >= "18" && $hour < "24") {
                        $time = "Evening";
                    } else
                    if ($hour >= "1" && $time < "6") {
                        $time = "Night";
                    }
                    $day = strtolower(date('l')) . 's';
                @endphp

                @foreach ($users as $user)
                <!--begin::Col-->
                <div class="col-md-6 col-xxl-4">

                    @php
                        $schedules = explode(',', $user->$day);

                        $availability = '';

                        if (in_array($time, $schedules)) {
                            $availability = 'yes';
                        } else {
                            $availability = 'no';
                        }
                    @endphp
                    <div class="card">
                        <div class="card-body d-flex flex-center flex-column p-9">
                            <div class="symbol symbol-65px symbol-circle mb-5">
                                <img @if($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{$user->picture}}" @endif alt="{{$user->first_name}} {{$user->last_name}}"  height="100" width="100" />
                                <div class="bg-{{$availability == 'yes'?'success':'danger'}} position-absolute rounded-circle translate-middle start-100 top-100 border border-4 border-white h-15px w-15px ms-n3 mt-n3"></div>
                            </div>
                            <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Dr. {{ ucfirst($user->first_name) }} {{ ucfirst($user->middle_name) }} {{ ucfirst($user->last_name) }}</a>
                            <div class="badge badge-lg badge-light-primary d-inline mb-1">{{$user->rank}}</div>
                            <div class="d-flex flex-center flex-wrap mb-2">
                                <div class="border border-dashed rounded d-flex min-w-125px py-3 px-4 mx-3 mb-3">
                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                        <svg width="100" height="100" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.207 13.293L7.5 14a5.5 5.5 0 110-11h5a5.5 5.5 0 110 11s-1.807 2.169-4.193 2.818C7.887 16.933 7.449 17 7 17c.291-.389.488-.74.617-1.052C8.149 14.649 7.5 14 7.5 14c.707-.707.708-.707.708-.706h.001l.002.003.004.004.01.01a1.184 1.184 0 01.074.084c.039.047.085.108.134.183.097.15.206.36.284.626.114.386.154.855.047 1.394.717-.313 1.37-.765 1.895-1.201a10.266 10.266 0 001.013-.969l.05-.056.01-.012m0 0A1 1 0 0112.5 13a4.5 4.5 0 100-9h-5a4.5 4.5 0 000 9 1 1 0 01.707.293" clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                    <div class="fs-6 fw-bolder text-gray-700">&#x20A6;{{number_format($user->chat_rate,0)}}<br /> <span class="fw-bold text-gray-400">/Hour</span></div>
                                </div>
                                <div class="border border-dashed rounded d-flex min-w-125px py-3 px-4 mx-3 mb-3">
                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                        <svg width="100" height="100" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.667 5.5c-.645 0-1.167.522-1.167 1.167v6.666c0 .645.522 1.167 1.167 1.167h6.666c.645 0 1.167-.522 1.167-1.167V6.667c0-.645-.522-1.167-1.167-1.167H4.667zM2.5 6.667C2.5 5.47 3.47 4.5 4.667 4.5h6.666c1.197 0 2.167.97 2.167 2.167v6.666c0 1.197-.97 2.167-2.167 2.167H4.667A2.167 2.167 0 012.5 13.333V6.667z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M13.25 7.65l2.768-1.605a.318.318 0 01.482.263v7.384c0 .228-.26.393-.482.264l-2.767-1.605-.502.865 2.767 1.605c.859.498 1.984-.095 1.984-1.129V6.308c0-1.033-1.125-1.626-1.984-1.128L12.75 6.785l.502.865z" clip-rule="evenodd"/>
                                            </svg>
                                    </span>
                                    <div class="fs-6 fw-bolder text-gray-700">&#x20A6;{{number_format($user->video_rate,0)}}<br />  <span class="fw-bold text-gray-400">/Hour</span></div>
                                </div>
                                <div class="d-flex flex-stack flex-grow-1">
                                <div class="border border-dashed rounded min-w-125px py-3 px-4 mx-3 mb-3">
                                    <div class="fs-6 fw-bolder text-gray-700">{{$user->experience}}+</div>
                                    <div class="fw-bold text-gray-400">Experience</div>
                                </div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <a href="{{route('doctors.details',$user->number)}}" class="btn btn-sm btn-light-primary">
                            <!--end::Svg Icon-->View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--end::Row-->
            {{ $users->links() }}
        
           
           
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@endsection

@section('js')
<script src="/assets/js/custom/pages/profile/connections.js"></script>
<script src="/assets/js/custom/modals/offer-a-deal.bundle.js"></script>
<script src="/assets/js/custom/widgets.js"></script>
@endsection