@extends('layout.master')
@section('PageTitle', 'Students Debt')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Students Debt</h4>

                            </div>
                        </div>
                        <hr>
                        <div class="iq-card-body">


                            <form method="POST" action="{{ route('debt.index') }}">
                                @csrf

                                <div class="form-row">

                                    <div class="form-group col-md-2">
                                        <label>Class</label>
                                        <select name="class_id" id="class_id" class="form-control form-control-sm" required>
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Class Section</label>
                                        <select name="class_section_id" id="class_section_id" class="form-control form-control-sm" required>
                                            <option value="">Select Category</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form_group col-md-2" style="padding-top: 32px;">
                
                                        <button type="submit"  class="btn btn-sm btn-primary text-white ml-2"><i class="fa fa-search"></i> Search</button>
                                     </div>


                                </div>
                            </form>


                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped dt-responsive" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    {{-- <th>Session</th> --}}
                                                    <th>Class</th>
                                                    <th>Term</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Description</th>
                                                    <th>Method</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
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


