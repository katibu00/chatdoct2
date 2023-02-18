@extends('layouts.master')
@section('PageTitle', 'Admins')

@section('css')
    <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-subscription-table-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Users" />
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_subscriptions_table .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th class="min-w-25px">S/N</th>
                                <th class="min-w-50px">PHOTO</th>
                                <th class="min-w-125px">NAME</th>
                                <th class="min-w-125px">RANK</th>
                                <th class="min-w-125px">JOINED</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>

                        <tbody class="text-gray-600 fw-bold">

                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a>
                                                <div class="symbol-label">
                                                    <img @if ($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $user->picture }}" @endif
                                                        alt="{{ $user->first_name }} {{ $user->last_name }}" />
                                                </div>
                                            </a>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <a class="text-gray-800 text-hover-primary mb-1">{{ $user->first_name }}
                                                {{ $user->middle_name }} {{ $user->last_name }}</a>
                                            <span>{{ $user->email }}</span>
                                        </div>
                                    </td>
                                    <td> {{ @$user->rank }}</td>

                                    <td> {{ @$user->created_at->diffForHumans() }}</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#details{{ $key }}">Details</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3 deleteItem"  data-id="{{ $user->id }}" data-name="{{ $user->first_name.' '.$user->last_name }}">Delete</a>
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <!--begin::Modal - View Details-->
                                <div class="modal fade" id="details{{ $key }}" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header pb-0 border-0 justify-content-end">
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                    data-bs-dismiss="modal">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="6" y="17.3137"
                                                                width="16" height="2" rx="1"
                                                                transform="rotate(-45 6 17.3137)" fill="black" />
                                                            <rect x="7.41422" y="6" width="16"
                                                                height="2" rx="1"
                                                                transform="rotate(45 7.41422 6)" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                            </div>

                                            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                                <!--begin::Heading-->
                                                <div class="text-center mb-13">
                                                    <!--begin::Title-->
                                                    <h1 class="mb-3">{{ $user->first_name }} {{ $user->middle_name }}
                                                        {{ $user->last_name }}</h1>
                                                    <div class="text-muted fw-bold fs-5">{{ $user->number }}</div>
                                                </div>

                                                <div class="mb-15">
                                                    <!--begin::List-->
                                                    <div class="mh-375px scroll-y me-n7 pe-7">
                                                        <div
                                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                            <!--begin::Details-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-100px symbol-circle">
                                                                    <img @if ($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $user->picture }}" @endif
                                                                        alt="{{ $user->first_name }} {{ $user->last_name }}" />
                                                                </div>
                                                                <!--end::Avatar-->
                                                                <!--begin::Details-->
                                                                <div class="ms-6">
                                                                    <!--begin::Name-->
                                                                    <a
                                                                        class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">{{ $user->first_name }}
                                                                        {{ $user->middle_name }} {{ $user->last_name }}
                                                                        <span
                                                                            class="badge badge-info fs-8 fw-bold ms-2">{{ $user->rank }}</span></a>
                                                                  
                                                                    <div class="fw-bold text-muted">{{ $user->email }}
                                                                    </div>
                                                                    <!--end::Email-->
                                                                </div>
                                                            </div>

                                                            <div class="d-flex">

                                                            </div>
                                                            <!--end::Stats-->
                                                        </div>
                                                        <!--end::User-->

                                                        <!--begin::User-->
                                                        <div
                                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                            <!--begin::Details-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                </div>

                                                                <div class="ms-6">
                                                                    <!--begin::Name-->
                                                                    <a class="d-flex align-items-center fs-5 fw-bolder ">Speciality:
                                                                        @php
                                                                            $datas = $user->speciality;
                                                                            $data = explode(',', $datas);
                                                                        @endphp
                                                                        <span class="text-dark text-hover-primary"> &nbsp;
                                                                            @foreach ($data as $dat)
                                                                                <span
                                                                                    class="badge badge-light fs-8 fw-bold ms-2">{{ $dat }}</span>
                                                                            @endforeach
                                                                        </span>
                                                                    </a>

                                                                </div>
                                                            </div>

                                                            <div class="d-flex">
                                                                <div class="text-end">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::User-->

                                                        <!--begin::User-->
                                                        <div
                                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                            <!--begin::Details-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                </div>
                                                                <div class="ms-6">
                                                                    <!--begin::Name-->
                                                                    <a class="d-flex align-items-center fs-5 fw-bolder ">Languages:
                                                                        @php
                                                                            $datas = $user->languages;
                                                                            $data = explode(',', $datas);
                                                                        @endphp
                                                                        <span class="text-dark text-hover-primary"> &nbsp;
                                                                            @foreach ($data as $dat)
                                                                                <span
                                                                                    class="badge badge-light fs-8 fw-bold ms-2">{{ $dat }}</span>
                                                                            @endforeach
                                                                        </span></a>

                                                                </div>
                                                                <!--end::Details-->
                                                            </div>

                                                            <div class="d-flex">
                                                                <div class="text-end">
                                                                </div>
                                                            </div>
                                                            <!--end::Stats-->
                                                        </div>

                                                        <div
                                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                            <!--begin::Details-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                </div>

                                                                <div class="ms-6">
                                                                    <!--begin::Name-->
                                                                    <a class="d-flex align-items-center fs-5 fw-bolder ">Gender:

                                                                        <span class="text-dark text-hover-primary"> &nbsp;
                                                                            {{ $user->sex }}</span></a>

                                                                </div>
                                                            </div>

                                                            <div class="d-flex">
                                                                <!--begin::Sales-->
                                                                <div class="text-end">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                            <!--begin::Details-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                </div>

                                                                <div class="ms-6">
                                                                    <!--begin::Name-->
                                                                    <a class="d-flex align-items-center fs-5 fw-bolder ">Experience:

                                                                        <span class="text-dark text-hover-primary"> &nbsp;
                                                                            {{ $user->experience }} years</a>

                                                                </div>
                                                                <!--end::Details-->
                                                            </div>

                                                            <div class="d-flex">
                                                                <!--begin::Sales-->
                                                                <div class="text-end">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                            <!--begin::Details-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                </div>

                                                                <div class="ms-6">
                                                                    <!--begin::Name-->
                                                                    <a class="d-flex align-items-center fs-5 fw-bolder ">Folio
                                                                        Number:

                                                                        <span class="text-dark text-hover-primary"> &nbsp;
                                                                            {{ $user->folio }}</span></a>

                                                                </div>
                                                                <!--end::Details-->
                                                            </div>

                                                            <div class="d-flex">
                                                                <div class="text-end">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                            <!--begin::Details-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                </div>

                                                                <div class="ms-6">
                                                                    <!--begin::Name-->
                                                                    <a class="d-flex align-items-center fs-5 fw-bolder ">State
                                                                        and LGA:

                                                                        <span class="text-dark text-hover-primary"> &nbsp;
                                                                            {{ $user->state }} -
                                                                            {{ $user->lga }}</span></a>

                                                                </div>
                                                                <!--end::Details-->
                                                            </div>

                                                            <div class="d-flex">
                                                                <div class="text-end">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                            <!--begin::Details-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                </div>

                                                                <div class="ms-6">
                                                                    <!--begin::Name-->
                                                                    <a class="d-flex align-items-center fs-5 fw-bolder ">Practice
                                                                        License:

                                                                        <span class="text-dark text-hover-primary"> &nbsp;
                                                                        </span></a>
                                                                    <!--end::Name-->
                                                                    <!--begin::Email-->
                                                                    <a href="/uploads/avatar/{{ $user->certificate }}"
                                                                        target="_blank"><img
                                                                            src="/uploads/avatar/{{ $user->certificate }}"
                                                                            alt="{{ $user->first_name }} {{ $user->last_name }}" /></a>
                                                                    <!--end::Email-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-center flex-row-fluid pt-5">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-bs-dismiss="modal">Dismiss</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="approve{{ $key }}" tabindex="-1"
                                    aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header pb-0 border-0 justify-content-end">
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                    data-bs-dismiss="modal">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="6" y="17.3137"
                                                                width="16" height="2" rx="1"
                                                                transform="rotate(-45 6 17.3137)" fill="black" />
                                                            <rect x="7.41422" y="6" width="16"
                                                                height="2" rx="1"
                                                                transform="rotate(45 7.41422 6)" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>

                                            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                                <div class="text-center mb-13">

                                                </div>

                                                <div class="mb-15">
                                                    <div class="mh-375px scroll-y me-n7 pe-7">

                                                        <div class="text-muted fw-bold fs-5 text-center">Are you sure you
                                                            want make {{ $user->first_name }} {{ $user->middle_name }}
                                                            {{ $user->last_name }} doctor?</div>

                                                    </div>
                                                    <!--end::List-->
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <!--begin::Label-->
                                                    <div class="fw-bold">

                                                    </div>

                                                    <a href="{{ route('doctors.applications.submit', $user->id) }}"
                                                        class="btn btn-lg btn-primary">Continue
                                                        <span class="svg-icon svg-icon-3 ms-1 me-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="18" y="13"
                                                                    width="13" height="2" rx="1"
                                                                    transform="rotate(-180 18 13)" fill="black" />
                                                                <path
                                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="/sweetalert.min.js"></script>
    <script>
        //delete item
        $(document).on('click', '.deleteItem', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            let name = $(this).data('name');
            swal({
                    title: "Delete " + name + "?",
                    text: "Once deleted, you will not be able to recover it!",
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
                            url: "{{ route('doctors.delete') }}",
                            method: 'POST',
                            data: {
                                id: id,
                            },

                            success: function(res) {

                                if (res.status == 200) {
                                    swal('Deleted', res.message, "success");
                                    $('.table').load(location.href + ' .table');
                                }

                            }
                        });
                    }
                });

        });
    </script>

@endsection
