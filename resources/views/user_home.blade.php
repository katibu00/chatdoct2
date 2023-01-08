@extends('layout.master')
@section('PageTitle', 'Home')


@section('content')

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">

             <div class="iq-card-body">

                <div class="row">
                                <div class="col-lg-6">
                                    <img src="/uploads/logo.png" class="img-fluid w-25" alt="">
                                </div>
                                <div class="col-lg-6 align-self-center">
                                    <h4 class="mb-0 float-right">Invoice</h4>
                                </div>
                                <div class="col-sm-12">
                                    <hr class="mt-3">
                                    <h5 class="mb-0">Hello, Mr. {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h5>
                                    <p>IntelS is a cloud-based, SaaS (Software as a Service) developed to manage school’s data so as to improve School’s operations, reduce manual tasks, increase productivity, enhance parents’ satisfaction and engagement, generate useful reports and deliver the core functionalities that makes work and collaboration easier for stakeholders. It will save you time, effort and money.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order Date</th>
                                                    <th scope="col">Order Status</th>
                                                    <th scope="col">Order ID</th>
                                                    <th scope="col">Order Details</th>
                                                    <th scope="col">Account Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{Auth::user()->created_at->format('M j, Y ')}}</td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>{{Auth::user()->created_at->format('mdHi')}}</td>
                                                    <td>
                                                        <p class="mb-0">Registration Fee for user<br>
                                                            Name: Mr. {{Auth::user()->first_name}} {{Auth::user()->last_name}}<br>
                                                            Contact: {{Auth::user()->email}}<br>
                                                            Amount: &#8358;3,000
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">Account Name: 0607737706<br>
                                                            Account Name: Umar Muhammad Katibu<br>
                                                            Bank: GTBank
                                                           
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5>Proposed Solutions</h5>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">#</th>
                                                    <th scope="col">Item</th>
                                                    <th class="text-center" scope="col">Included?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="text-center" scope="row">1</th>
                                                    <td>
                                                        <h6 class="mb-0">Students’ Academic Record Management System</h6>
                                                        <p class="mb-0">Subject teachers will submit marks, principal/form masters will enter comments and Result is generated within seconds while freeing your time and effort.</p>
                                                    </td>
                                                    <td class="text-center">  <i style="font-size: 30px; color: green;"  class="las la-check-square"></i></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" scope="row">2</th>
                                                    <td>
                                                        <h6 class="mb-0">Smart School Accounting System (SSA)</h6>
                                                        <p class="mb-0">Track debt and every payment and generate useful reports while watching over expenditures.</p>
                                                    </td>
                                                    <td class="text-center">  <i style="font-size: 30px; color: green;"  class="las la-check-square"></i></td>                                
                                                </tr>
                                                <tr>
                                                    <th class="text-center" scope="row">3</th>
                                                    <td>
                                                        <h6 class="mb-0">School Attandance Management System (SAM)</h6>
                                                        <p class="mb-0">Take attendace more easily and analyse the trend effortless while letting parents know when their child misses school..</p>
                                                    </td>
                                                    <td class="text-center">  <i style="font-size: 30px; color: green;"  class="las la-check-square"></i></td>                                                     
                                                </tr>
                                                <tr>
                                                    <th class="text-center" scope="row">4</th>
                                                    <td>
                                                        <h6 class="mb-0">Students’ Admission System</h6>
                                                        <p class="mb-0">Let anyone apply for your school from their home or your school premises. Keep the records and analyzed the trend to gain insight on how you can grow your school.</p>
                                                    </td>
                                                    <td class="text-center">  <i style="font-size: 30px; color: green;"  class="las la-check-square"></i></td>                                                   
                                                </tr>
                                                <tr>
                                                    <th class="text-center" scope="row">5</th>
                                                    <td>
                                                        <h6 class="mb-0">Online Examination System</h6>
                                                        <p class="mb-0">Engaged students even at home. Give them tests and examinations online. Save yourself marking stress and let students practise WAEC and JAMB while monitoring their performance.</p>
                                                    </td>
                                                    <td class="text-center"><i style="font-size: 30px; color: red;" class="lar la-window-close"></i></td>                                                   
                                                </tr>
                                                <tr>
                                                    <th class="text-center" scope="row">5</th>
                                                    <td>
                                                        <h6 class="mb-0">Library Management System</h6>
                                                        <p class="mb-0">Let students browse your book catalogue at home and borrow any book from home. Keep record of all your library activities in one place.</p>
                                                    </td>
                                                    <td class="text-center"><i style="font-size: 30px; color: red;" class="lar la-window-close"></i></td>                                                                                                
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h5 class="mt-5">Order Details</h5>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Bank</th>
                                                    <th scope="col">.Acc.No</th>
                                                    <th scope="col">Due Date</th>
                                                    <th scope="col">Sub-total</th>
                                                    <th scope="col">Discount</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">GT Bank</th>
                                                    <td>060773376</td>
                                                    <td>{{Auth::user()->created_at->format('M j, Y ')}}</td>
                                                    <td>&#8358;3,000</td>
                                                    <td>0%</td>
                                                    <td><b>&#8358;3,000</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                                {{-- <div class="col-sm-6 text-right">
                                    <button type="button" class="btn btn-link mr-3"><i class="ri-printer-line"></i> Download Print</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div> --}}
                                <div class="col-sm-12 mt-5">
                                    <b class="text-danger">Notes:</b>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                </div>
                            </div>

             </div>
          </div>
                </div>
            </div>
        </div>
    </div>
@endsection
