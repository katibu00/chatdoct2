@extends('layouts.master')
@section('PageTitle','Doctor Home')
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">

        @if(auth()->user()->status != 0)

        @if(auth()->user()->chat_rate == null || auth()->user()->video_rate  == null || auth()->user()->about  == null || auth()->user()->phone == null || auth()->user()->address == null)
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-12 p-6">
            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                </svg>
            </span>
            <div class="d-flex flex-stack flex-grow-1">
                <div class="fw-bold">
                    <h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
                    <div class="fs-6 text-gray-700">Your profile is not complete. 
                    <a href="{{ route('doctors.profile.settings')}}" class="fw-bolder" >Update Profile</a>.</div>
                </div>
            </div>
        </div>
        @endif

        @else
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-12 p-6">
            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                </svg>
            </span>
            <div class="d-flex flex-stack flex-grow-1">
                <div class="fw-bold">
                    <div class="fs-6 text-gray-700">Your Application is currently under review.</div>
                </div>
            </div>
        </div>
        @endif


        <div class="row g-5 g-xl-8">
           
            <div class="col-xl-4">
                <div class="card card-xl-stretch mb-xl-8">
                    <div class="card-body p-0">
                        <div class="px-9 pt-7 card-rounded h-275px w-100 bg-primary">
                            <div class="d-flex flex-stack">
                                <h3 class="m-0 text-white fw-bolder fs-3">Patients</h3>
                                <div class="ms-1">
                                    
                                    <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-primary border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                    
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="{{ route('doctor.patients') }}" class="menu-link px-3">Go to My Patients</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="d-flex text-center flex-column text-white pt-8">
                                <span class="fw-bold fs-7">Active Patients</span>
                                <span class="fw-bolder fs-2x pt-1">{{ $active }}</span>
                            </div>
                            
                        </div>
                        
                        
                        <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                            <div class="d-flex align-items-center mb-6">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Active</a>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">{{ $active }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="d-flex align-items-center mb-6">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <span class="svg-icon svg-icon-1">
                                            <i class="far fa-dot-circle"></i>
                                        </span>
                                    </span>
                                </div>
                                
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Pending</a>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">{{ $pending }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="d-flex align-items-center mb-6">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>                                
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Completed</a>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">{{ $completed }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Total</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">{{ $completed+$active+$pending }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card card-xl-stretch mb-xl-8">
                    <div class="card-body p-0">
                        <div class="px-9 pt-7 card-rounded h-275px w-100 bg-danger">
                            <div class="d-flex flex-stack">
                                <h3 class="m-0 text-white fw-bolder fs-3">Earnings</h3>
                                <div class="ms-1">
                                    
                                    <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-danger border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                    
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Request Withdrawal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-center flex-column text-white pt-8">
                                <span class="fw-bold fs-7">Wallet Balance</span>
                                <span class="fw-bolder fs-2x pt-1">&#8358;{{ number_format(auth()->user()->balance )}}</span>
                            </div>
                            
                        </div>
                        
                        <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                            
                            <div class="d-flex align-items-center mb-6">
                                
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                
                                
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Today</a>
                                    </div>
                                 
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">&#8358;{{ number_format($today_total,0) }}</div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                          
                            <div class="d-flex align-items-center mb-6">
                                
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <span class="svg-icon svg-icon-1">
                                            <i class="far fa-dot-circle"></i>
                                        </span>
                                    </span>
                                </div>
                               
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">This Month</a>
                                    </div>
                                  
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">&#8358;{{ number_format($month_total,0) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-6">
                                
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Total Earning</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">&#8358;{{ number_format(auth()->user()->total_earning,0) }}</div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Balance</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">&#8358;{{ number_format(auth()->user()->balance )}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col-xl-4">
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    
                    <div class="card-body p-0">
                        
                        <div class="px-9 pt-7 card-rounded h-275px w-100 bg-success">
                            
                            <div class="d-flex flex-stack">
                                <h3 class="m-0 text-white fw-bolder fs-3">My Schedules</h3>
                                <div class="ms-1">
                                    
                                    <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-success border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        
                                    </button>
                                    
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                       
                                        
                                        <div class="menu-item px-3">
                                            <a href="{{ route('doctors.schedules') }}" class="menu-link px-3">Go to My Schedules</a>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            
                            
                            <div class="d-flex text-center flex-column text-white pt-8">
                                <span class="fw-bolder fs-2x fs-7">Today</span>
                                @php
                                    $blocks = explode(',', $today_schedules); 
                                    $mons = explode(',', auth()->user()->mondays); 
                                    $weds = explode(',', auth()->user()->wednesdays); 
                                    $fris = explode(',', auth()->user()->fridays); 
                                    $suns = explode(',', auth()->user()->sundays); 
                                @endphp
                                <span class=" pt-1 fw-bold fs-7">
                                    @foreach ($blocks as $block)
                                        {{$block}}@if(!$loop->last),@endif
                                    @endforeach
                                </span>
                            </div>
                            
                        </div>
                        
                        
                        <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                            
                            <div class="d-flex align-items-center mb-6">
                                
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                
                                
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Mon</a>
                                    </div>
                                    
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-bold fs-7 pe-1">
                                            @if($mons[0] == "")
                                                <i class="fa fa-times text-danger"></i>
                                            @else
                                                @foreach ($mons as $mon)
                                                    {{$mon}}@if(!$loop->last),@endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="d-flex align-items-center mb-6">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <span class="svg-icon svg-icon-1">
                                            <i class="far fa-dot-circle"></i>
                                        </span>
                                        
                                    </span>
                                </div>
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Wed</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-bold fs-7 pe-1">
                                            @if($weds[0] == "")
                                                <i class="fa fa-times text-danger"></i>
                                            @else
                                                @foreach ($weds as $wed)
                                                    {{$wed}}@if(!$loop->last),@endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-6">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Fri</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-bold fs-7 pe-1">
                                            @if($fris[0] == "")
                                                <i class="fa fa-times text-danger"></i>
                                            @else
                                                @foreach ($fris as $fri)
                                                    {{$fri}}@if(!$loop->last),@endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Sun</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-bold fs-7 pe-1">
                                            @if($suns[0] == "")
                                                <i class="fa fa-times text-danger"></i>
                                            @else
                                                @foreach ($suns as $sun)
                                                    {{$sun}}@if(!$loop->last),@endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">My Recent Bookings</span>
                </h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                        </div>
                        <div class="separator mb-3 opacity-75"></div>
                        <div class="menu-item px-3">
                            <a href="{{ route('doctor.patients') }}" class="menu-link px-3">Go to My Patients</a>
                        </div>              
                    </div>
                   
                </div>
            </div>
          
            <div class="card-body pt-3">
                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="border-0">
                                <th class="p-0"></th>
                                <th class="p-0"></th>
                                <th class="p-0"></th>
                                <th class="p-0"></th>
                                <th class="p-0"></th>
                                {{-- <th class="p-0 text-end"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($patients as $key => $patient)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px me-5">
                                            <img @if ($patient['patient']['picture'] == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $patient['patient']['picture'] }}" @endif
                                            alt=""/>
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $patient->patient->first_name.' '.$patient->patient->middle_name.' '.$patient->patient->last_name }}</a>
                                            <a href="#" class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
                                            <span class="text-dark">Phone</span>: {{ $patient['patient']['phone'] }}</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $patient->book_type }}</a>
                                </td>
                                <td class="text-muted fw-bold">{!! $patient->pre_consultation == 1 ? ' <span class="badge badge-light-success">Pre-Consultation Filled</span>': ' <span class="badge badge-light-danger">Pre-Consultation Not Filled</span>'!!}</td>
                                <td>
                                    {!! $patient->prescription == 1 ? ' <span class="badge badge-light-success">Prescribed</span>': ' <span class="badge badge-light-danger">Not Prescribed</span>'!!}
                                </td>
                                <td>
                                    {!! $patient->time != null ?  \Carbon\Carbon::createFromFormat('H:i:s', @$patient->time)->format('h:i A') : ' <span class="badge badge-light-danger">Exact Time Not Appointed</span>'!!}
                                </td>
                            </tr> 
                          @empty
                             <tr>
                                <td colspan="5">  <div class="alert alert-warning" role="alert">You don't have ongoing booking at the moment. When you do, they will be listed here.</div></td>
                            </tr> 
                          @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        

    </div>
</div>
@endsection

@section('js2')
<script src="/assets/js/custom/widgets.js"></script>
<script src="/assets/js/custom/apps/chat/chat.js"></script>
<script src="/assets/js/custom/modals/create-app.js"></script>
<script src="/assets/js/custom/modals/upgrade-plan.js"></script>
@endsection