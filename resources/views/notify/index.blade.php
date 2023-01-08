@extends('layout.master')
@section('PageTitle','Payment Notifications')
@section('content')

<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Payment Notifications</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                        <hr>
                         <table id="example1" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th>S/N</th>
                                  <th>Passport</th>
                                  <th>Parent Name</th>
                                  <th>Phone</th>
                                  <th>Description</th>
                                  <th>Submitted</th>
                                  <th>Status</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach ($allData as $key=>$value)
                               <tr>
                                  <td>{{$key+1}}</td>

                                  <td class="text-center">
                                    <img src="/uploads/users/{{$value['user']['image']}}" class="rounded-circle img-fluid avatar-40" alt="user">
                                  </td>

                                  <td>
                                      {{$value['user']['first_name']}}  {{$value['user']['middle_name']}}  {{$value['user']['last_name']}}
                                 </td>

                                 <td>
                                    {{$value['user']['phone']}}
                                 </td>


                                  <td>{{$value['description']['name']}}</td>
                                  <td>{{$value->created_at->diffForHumans()}}</td>
                                  @if ($value->status == 1)
                                  <td><span class="badge iq-bg-success">Attended</span></td>
                                  @else
                                  <td><span class="badge iq-bg-danger">Unattended</span></td>
                                  @endif

                                  <td>
                                     <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="modal" data-target="#details{{$value->id}}"><i class="las la-eye"></i></a>
                                     </div>
                                  </td>
                               </tr>

                            <!--- Details modal --->
                             <div class="modal fade bd-example-modal-lg" id="details{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="details{{$value->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                         </button>
                                      </div>
                                      <div class="modal-body">

                                        <div class="form-row">
                                            <div class="col-md-8">
                                                @if ($value['user']['usertype'] == 'applicant')
                                                <h5><strong>Application ID:</strong> {{$value['user']['applicant_login']}}</h5>
                                                @else
                                                <h5><strong>Matric Number:</strong> {{$value['user']['matric_number']}}</h5>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                @if ($value['user']['usertype'] == 'applicant')
                                                <img src="/uploads/documents/{{date('Y')}}/avatar/{{$value['user']['image']}}" class="img-fluid avatar-100" alt="user">
                                                @else
                                                <img src="/uploads/users/{{$value['user']['image']}}" class="img-fluid avatar-100" alt="user">
                                                @endif
                                             </div>
                                        </div>

                                        <hr><div class="form-row">
                                                <div class="col-md-4">
                                                <h5><strong>Full Name:</strong>{{$value['user']['first_name']}} {{$value['user']['middle_name']}} {{$value['user']['last_name']}}</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5><strong>Phone:</strong> {{$value['user']['phone']}}</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5><strong>Email:</strong> {{$value['user']['email']}}</h5>
                                                </div>
                                        </div>
                                        <hr><div class="form-row">
                                            <div class="col-md-6">
                                            <h5><strong>Department:</strong> {{$value['user']['faculty']['name']}}</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5><strong>Course:</strong> {{$value['user']['department']['name']}}</h5>
                                            </div>

                                        </div>

                                        <hr><div class="form-row">
                                            <div class="col-md-4">
                                            <h5><strong>Payment Type:</strong> {{$value['type']['name']}}</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <h5><strong>Transaction Method:</strong> {{$value['method']['name']}}</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <h5><strong>Amount:</strong> {{$value->amount}}</h5>
                                            </div>
                                        </div>

                                        <hr><div class="form-row">
                                            <form action="{{route('mark.payment.verification')}}" method="post">
                                                @csrf
                                            <div class="col-md-10">
                                                @if ($value->status == 1)
                                                <button type="submit" class="btn btn-warning btn-sm next action-button pull-right" value="Submit" >Mark Unattended</button>
                                                @else
                                                <button type="submit" class="btn btn-success btn-sm next action-button pull-right" value="Submit" >Mark Attended</button>
                                                @endif

                                              <input type="hidden" name="id" value="{{$value->id}}">
                                            </div>
                                            </form>

                                            <form action="{{route('delete.payment.verification')}}" method="post">
                                                @csrf
                                               <button type="submit" class="btn btn-danger btn-sm next action-button pull-right" value="Submit" >Delete</button>
                                               <input type="hidden" name="id" value="{{$value->id}}">
                                            </form>
                                        </div>


                                      </div>
                                      </div>
                                   </div>
                                </div>
                             </div>


                           </tbody>
                           @endforeach
                         </table>
                      </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
 </div>
 @endsection
