@extends('layout.master')
@section('PageTitle','Edit Profile')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">

          <div class="col-lg-12">
             <div class="iq-edit-list-data">
                <div class="tab-content">
                   <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                       <div class="iq-card">
                         <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                               <h4 class="card-title">Update Your Profile </h4>
                            </div>
                         </div>
                         <div class="iq-card-body">
                            <form action="{{route('profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                               <div class="form-group row align-items-center">
                                  <div class="col-md-12">
                                     <div class="profile-img-edit">
                                        <img class="profile-pic" @if($user->image == 'default.png') src="/uploads/default.png" @else src="/uploads/{{$school->username}}/{{$user->image}}" @endif alt="profile-pic">
                                        <div class="p-image">
                                          <i class="ri-pencil-line upload-button"></i>
                                          <input class="file-upload" name="image" type="file" accept="image/*"/>
                                       </div>
                                     </div>
                                  </div>
                               </div>
                               <div class=" row align-items-center">
                                  <div class="form-group col-sm-4">
                                     <label for="fname">First Name:</label>
                                     <input type="text" class="form-control" name="first_name" id="fname" value="{{$user->first_name}}" required>
                                  </div>
                                  <div class="form-group col-sm-4">
                                     <label for="lname">Middle Name:</label>
                                     <input type="text" class="form-control" name="middle_name" id="lname" value="{{$user->middle_name}}">
                                  </div>
                                  <div class="form-group col-sm-4">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname"  name="last_name" value="{{$user->last_name}}" required>
                                 </div>
                                  <div class="form-group col-sm-4">
                                     <label for="uname">Email:</label>
                                     <input type="email" class="form-control" name="email" id="uname" value="{{$user->email}}">
                                  </div>
                                  <div class="form-group col-sm-4">
                                     <label for="cname">Phone:</label>
                                     <input type="text" class="form-control" name="phone" id="cname" value="{{$user->phone}}" required>
                                  </div>


                                  <div class="form-group col-sm-4">
                                     <label>Gender:</label>
                                     <select class="form-control" id="" name="gender" required>
                                        <option value="">Select gender</option>

                                        <option value="Male"  {{($user->gender == 'Male')?"Selected":""}}>Male</option>
                                        <option value="Female"  {{($user->gender == 'Female')?"Selected":""}}>Female</option>

                                     </select>
                                  </div>


                               </div>
                               <button type="submit" class="btn btn-primary mr-2">Submit</button>
                               <button type="reset" class="btn iq-bg-danger">Cancle</button>
                            </form>
                         </div>
                      </div>
                   </div>

                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
@endsection
