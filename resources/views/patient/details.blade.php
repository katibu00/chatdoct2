@extends('layouts.master')
@section('PageTitle','Doctors Details')

@section('content')


	<!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img @if($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{$user->picture}}" @endif alt="{{$user->first_name}} {{$user->last_name}}"  />
                                    <div class="bg-{{$availability == 'yes'?'success':'danger'}} position-absolute rounded-circle translate-middle start-100 top-100 border border-4 border-white h-15px w-15px ms-n3 mt-n3"></div>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">Dr. {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="fs-5 fw-bold text-muted mb-6"><span class="badge badge-secondary fs-8 fw-bold ms-2 mb-1">{{$user->rank}}</span></div>
                                <!--end::Position-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap flex-center">
                                   <!--begin::Stats-->
                                <div class="border border-dashed rounded d-flex min-w-125px py-3 px-4 mx-3 mb-3">
                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                        <svg width="100" height="100" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.207 13.293L7.5 14a5.5 5.5 0 110-11h5a5.5 5.5 0 110 11s-1.807 2.169-4.193 2.818C7.887 16.933 7.449 17 7 17c.291-.389.488-.74.617-1.052C8.149 14.649 7.5 14 7.5 14c.707-.707.708-.707.708-.706h.001l.002.003.004.004.01.01a1.184 1.184 0 01.074.084c.039.047.085.108.134.183.097.15.206.36.284.626.114.386.154.855.047 1.394.717-.313 1.37-.765 1.895-1.201a10.266 10.266 0 001.013-.969l.05-.056.01-.012m0 0A1 1 0 0112.5 13a4.5 4.5 0 100-9h-5a4.5 4.5 0 000 9 1 1 0 01.707.293" clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                    <div class="fs-6 fw-bolder text-gray-700">&#x20A6;{{number_format($user->chat_rate,0)}}<br /> <span class="fw-bold text-gray-400">/slot</span></div>
                                </div>
                                <!--end::Stats-->

                                   <!--begin::Stats-->
                                <div class="border border-dashed rounded d-flex min-w-125px py-3 px-4 mx-3 mb-3">
                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                        <svg width="100" height="100" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.667 5.5c-.645 0-1.167.522-1.167 1.167v6.666c0 .645.522 1.167 1.167 1.167h6.666c.645 0 1.167-.522 1.167-1.167V6.667c0-.645-.522-1.167-1.167-1.167H4.667zM2.5 6.667C2.5 5.47 3.47 4.5 4.667 4.5h6.666c1.197 0 2.167.97 2.167 2.167v6.666c0 1.197-.97 2.167-2.167 2.167H4.667A2.167 2.167 0 012.5 13.333V6.667z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M13.25 7.65l2.768-1.605a.318.318 0 01.482.263v7.384c0 .228-.26.393-.482.264l-2.767-1.605-.502.865 2.767 1.605c.859.498 1.984-.095 1.984-1.129V6.308c0-1.033-1.125-1.626-1.984-1.128L12.75 6.785l.502.865z" clip-rule="evenodd"/>
                                            </svg>
                                    </span>
                                    <div class="fs-6 fw-bolder text-gray-700">&#x20A6;{{number_format($user->video_rate,0)}}<br /> <span class="fw-bold text-gray-400">/slot</span></div>
                                </div>
                                <!--end::Stats-->
                                   
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Details
                                <span class="ms-2 rotate-180">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span></div>
                                <span>
                                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#book">BOOK NOW</a>
                                </span>
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <!--begin::Badge-->
                                    @if($user->featured == 1)
                                    <div class="badge badge-light-info d-inline">Featured Doctor</div>
                                    @endif
                                   
                                    <div class="fw-bolder mt-5">Availability</div>
                                    @if($availability == 'yes')
                                    <div class=" badge badge-light-success">Available</div>
                                    @endif
                                    @if($availability == 'no')
                                    <div class=" badge badge-light-danger">Not Available</div>
                                    @endif
                                    <div class="fw-bolder mt-5">User ID</div>
                                    <div class="text-gray-600">D{{$user->number}}</div>
                                   
                                    <div class="fw-bolder mt-5">About</div>
                                    <div class="text-gray-600">
                                        <!--begin::Notice-->
                                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
            
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <!--begin::Content-->
                                                <div class="fw-bold">
                                                    <div class="fs-6 text-gray-700">{{ @$user->about }}</div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Joined</div>
                                    <div class="text-gray-600">{{$user->created_at->diffForHumans()}}</div>
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab">Details</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#schedules">Schedules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_customer_view_overview_statements">Reviews</a>
                        </li>
                        <!--end:::Tab item-->
                
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">

                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                                      
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                          
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <th>
                                                    Full Name:
                                                </th>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td >Dr. {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->

                                                 <!--begin::Table row-->
                                                 <tr>
                                                    <!--begin::Invoice=-->
                                                    <th>
                                                        Rank:
                                                    </th>
                                                    <!--end::Invoice=-->
                                                    <!--begin::Status=-->
                                                    <td >{{$user->rank}}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                                <!--end::Table row-->

                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <td>
                                                    Speciality:
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>
                                                    @php
                                                    $datas = $user->speciality; 
                                                    $data = explode(',', $datas); 
                                                        @endphp
                                                    <span class="text-dark text-hover-primary"> &nbsp; @foreach ($data as $dat)
                                                        <span class="badge badge-light fs-8 fw-bold ms-2 mb-1">{{$dat}}</span>
                                                    @endforeach</span>
                                                </td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->

                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <th>
                                                    Price:
                                                </th>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>&#x20A6;{{number_format($user->price,0)}}/Hour</td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->

                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <td>
                                                    Languages:
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>
                                                   
                                                        @php
                                                            $datas = $user->languages; 
                                                            $data = explode(',', $datas); 
                                                        @endphp
                                                    <span class="text-dark text-hover-primary"> &nbsp; @foreach ($data as $dat)
                                                        <span class="badge badge-light fs-8 fw-bold ms-2">{{$dat}}</span>
                                                    @endforeach</span>
                                                    <!--end::Name-->
                                                </td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->

                                                 <!--begin::Table row-->
                                                 <tr>
                                                    <!--begin::Invoice=-->
                                                    <th>
                                                        Gender:
                                                    </th>
                                                    <!--end::Invoice=-->
                                                    <!--begin::Status=-->
                                                    <td >{{$user->sex}}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                                <!--end::Table row-->
                                      
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>

                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
                            <!--begin::Earnings-->
                            <div class="card mb-6 mb-xl-9">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Reviews</h2>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-0">
                                    <div class="fs-5 fw-bold text-gray-500 mb-4">No Reviews Yet</div>
                                   

                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Earnings-->
                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="schedules" role="tabpanel">
                            <!--begin::Earnings-->
                            <div class="card mb-6 mb-xl-9">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Doctor's Schedules</h2>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-0">

                                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                                      
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                       
                                       
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <td>
                                                    Mondays:
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>
                                                
                                                        @php
                                                            $datas = $user->mondays; 
                                                            $data = explode(',', $datas); 
                                                        @endphp
                                                    <span class="text-dark text-hover-primary"> &nbsp; @foreach ($data as $dat)
                                                        <span class="badge badge-light fs-8 fw-bold ms-2">{{$dat}}</span>
                                                    @endforeach</span>
                                                    <!--end::Name-->
                                                </td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->

                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <td>
                                                    Tuesdays:
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>
                                                
                                                        @php
                                                            $datas = $user->tuesdays; 
                                                            $data = explode(',', $datas); 
                                                        @endphp
                                                    <span class="text-dark text-hover-primary"> &nbsp; @foreach ($data as $dat)
                                                        <span class="badge badge-light fs-8 fw-bold ms-2">{{$dat}}</span>
                                                    @endforeach</span>
                                                    <!--end::Name-->
                                                </td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->

                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <td>
                                                    Wednesdays:
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>
                                                
                                                        @php
                                                            $datas = $user->wednesdays; 
                                                            $data = explode(',', $datas); 
                                                        @endphp
                                                    <span class="text-dark text-hover-primary"> &nbsp; @foreach ($data as $dat)
                                                        <span class="badge badge-light fs-8 fw-bold ms-2">{{$dat}}</span>
                                                    @endforeach</span>
                                                    <!--end::Name-->
                                                </td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->

                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <td>
                                                    Thursdays:
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>
                                                
                                                        @php
                                                            $datas = $user->thursdays; 
                                                            $data = explode(',', $datas); 
                                                        @endphp
                                                    <span class="text-dark text-hover-primary"> &nbsp; @foreach ($data as $dat)
                                                        <span class="badge badge-light fs-8 fw-bold ms-2">{{$dat}}</span>
                                                    @endforeach</span>
                                                    <!--end::Name-->
                                                </td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <td>
                                                    Fridays:
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>
                                                
                                                        @php
                                                            $datas = $user->fridays; 
                                                            $data = explode(',', $datas); 
                                                        @endphp
                                                    <span class="text-dark text-hover-primary"> &nbsp; @foreach ($data as $dat)
                                                        <span class="badge badge-light fs-8 fw-bold ms-2">{{$dat}}</span>
                                                    @endforeach</span>
                                                    <!--end::Name-->
                                                </td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->

                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <td>
                                                    Saturday:
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>
                                                    
                                                        @php
                                                            $datas = $user->saturdays; 
                                                            $data = explode(',', $datas); 
                                                        @endphp
                                                    <span class="text-dark text-hover-primary"> &nbsp; @foreach ($data as $dat)
                                                        <span class="badge badge-light fs-8 fw-bold ms-2">{{$dat}}</span>
                                                    @endforeach</span>
                                                    <!--end::Name-->
                                                </td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->


                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Invoice=-->
                                                <td>
                                                    Sunday:
                                                </td>
                                                <!--end::Invoice=-->
                                                <!--begin::Status=-->
                                                <td>
                                                    
                                                        @php
                                                            $datas = $user->sundays; 
                                                            $data = explode(',', $datas); 
                                                        @endphp
                                                    <span class="text-dark text-hover-primary"> &nbsp; @foreach ($data as $dat)
                                                        <span class="badge badge-light fs-8 fw-bold ms-2">{{$dat}}</span>
                                                    @endforeach</span>
                                                    <!--end::Name-->
                                                </td>
                                                <!--end::Status=-->
                                            </tr>
                                            <!--end::Table row-->
                                        </tbody>
                                    </table>

                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Earnings-->
                        </div>
                        <!--end:::Tab pane-->

                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

    <!--begin::Modal - Select Users-->
    <div class="modal fade" id="book" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-700px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 d-flex justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                    <!--begin::Heading-->
                    <div class="text-center mb-3">
                        <!--begin::Title-->
                        <h4 class="d-flex justify-content-center align-items-center mb-3">Book Consultation with Dr. {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}?<h4>
                  
                    </div>
                    <!--end::Heading-->
                    <!--begin::Users-->
                    <div class="mh-475px scroll-y me-n7 pe-7">

                        <!--begin::User-->
                        <div class="border border-hover-primary p-7 rounded mb-7">
                            <!--begin::Info-->
                            <div class="d-flex flex-stack pb-3">
                                <!--begin::Info-->
                                <div class="d-flex">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-65px symbol-circle mb-5">
                                        <img @if($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{$user->picture}}" @endif alt="{{$user->first_name}} {{$user->last_name}}"  height="100" width="100" />
                                        <div class="bg-{{$availability == 'yes'?'success':'danger'}} position-absolute rounded-circle translate-middle start-100 top-100 border border-4 border-white h-15px w-15px ms-n3 mt-n3"></div>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-5 me-4">Dr. {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</a>
                                            <!--begin::Label-->
                                           
                                        
                                        </div>
                                        
                                        <span class="text-muted fw-bold m-3">{{$user->rank}}</span>
                                        @if($availability == 'yes')
                                            <span class="badge badge-light-success fs-8 fw-bold">Available</span>
                                            @else
                                            <span class="badge badge-light-danger fs-8 fw-bold">Currently Unavailable</span>
                                            @endif
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Stats-->
                                <div clas="d-flex">
                                    <!--begin::Price-->
                                    <div class="text-end pb-3">
                                        <span class="text-dark fw-bolder fs-5">Chat: &#x20A6;{{number_format($user->chat_rate,0)}}</span>
                                        <span class="text-muted fs-7">/slot</span>
                                        <span class="text-dark fw-bolder fs-5">Video: &#x20A6;{{number_format($user->video_rate,0)}}</span>
                                        <span class="text-muted fs-7">/slot</span>
                                    </div>
                                    <!--end::Price-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Wrapper-->
                            <div class="p-0">
                                <!--begin::Section-->
                                <div class="d-flex flex-column">
                                    <!--begin::Text-->
                                    <p class="text-gray-700 fw-bold fs-6 mb-4">{!! @$user->about !!}</p>
                                    <!--end::Text-->
                                    <!--begin::Tags-->
                                    <div class="d-flex text-gray-700 fw-bold fs-7">

                                        @php
                                            $datas = $user->languages; 
                                            $data = explode(',', $datas); 
                                        @endphp

                                        @foreach ($data as $dat)
                                        <!--begin::Tag-->
                                        <span class="border border-2 rounded me-3 p-1 px-2">{{$dat}}</span>
                                        <!--end::Tag-->
                                       @endforeach
                                    </div>
                                    <!--end::Tags-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Footer-->
                                <div class="d-flex flex-column">
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed border-muted my-5"></div>
                                    <!--end::Separator-->
                                    <!--begin::Action-->
                                    <div class="d-flex flex-stack">
                                        
                                        <form action="{{route('book')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="doctor_id" value="{{$user->id}}">
                                            <div class="row">
                                                <div class="col-md-5 fv-row">
                                                    <select name="book_type" class="form-select form-select-solid  mb-3" data-control="select2" data-hide-search="true" data-placeholder="Book Type"   required>
                                                        <option></option>
                                                        <option value="chat">Chat</option>
                                                        <option value="video">Video Call</option>
                                                    </select>          
                                                </div>
                                                <div class="col-md-5 fv-row">
                                                    <select name="time_slot" id="time_slot" class="form-select form-select-solid mb-3"  data-control="select2" data-hide-search="true" data-placeholder="Time Slot..." >
                                                        <option></option>
                                                        <option value="Morning">Morning (6AM - 11:59PM)</option>
                                                        <option value="Noon">Noon (12PM - 5:59PM)</option>
                                                        <option value="Evening">Evening (6PM - 11:59PM)</option>
                                                        <option value="Night">Night (12AM - 5:59AM)</option>
                                                    </select>
                                                </div>
                                               
                                                <div class="col-md-2 fv-row">
                                                    <button type="submit" class="btn btn- btn-primary">Continue</button>
                                                </div>
                                              
                                            </div>
                                            <!--end::Row-->
                                        </form>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Footer-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::User-->
                       
                    </div>
                    <!--end::Users-->
                </div>
                <!--end::Modal Body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Select Users-->

    @endsection
