@extends('layout.master')
@section('PageTitle', 'Payment Report')
@section('content')


<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">
                             Payment Report
                         </div>

                      </div>
                      <hr>
                      <div class="iq-card-body col-md-12 mx-auto">

                        <form action="{{route('payment.report.generate')}}" method="post" target="__blank">
                            @csrf
                        <div class="form-row">

                            <div class="form-group col-md-2">
                                <label>Session: *</label>
                                <select name="session_id" id="session_id" class="form-control form-control-sm">
                                    <option value="">Select Level</option>
                                    @foreach ($sessions as $session)
                                        <option value="{{ $session->id }}"
                                            {{ $current == $session->id ? 'Selected' : '' }}>{{ $session->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Term: *</label>
                                <select name="term" id="term" class="form-control form-control-sm" required>
                                    <option value="">Select Term</option>
                                    <option value="First" @if($term == 'First') selected @endif>First Term</option>
                                    <option value="Second"  @if($term == 'Second') selected @endif>Second Term</option>
                                    <option value="Third" @if($term == 'Third') selected @endif>Third Term</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                            <label>Class: *</label>
                                <select class="form-control form-control-sm" id="class_id" name="class_id" required>
                                    <option selected="" value=""></option>
                                    @foreach ($classes as $class)
                                    <option value="{{$class->id}}"> {{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                            <label>Class Section: *</label>
                            <select class="form-control form-control-sm" id="class_section_id" name="class_section_id" required>
                                <option selected="" value=""></option>
                                @foreach ($sections as $section)
                                <option value="{{$section->id}}"> {{$section->name}}</option>
                                @endforeach
                            </select>
                            </div>

                                   <div class="form_group col-md-2" style="padding-top: 32px;">
                                      <a id="search_report" class="btn btn-sm btn-primary text-white">Search</a>
                                      <button type="submit"  class="btn btn-sm btn-danger text-white ml-2"><i class="fa fa-download"></i> PDF</button>
                                   </div>
                                </form>
                                </div>


                         <br/>
                         <div class="card-body">
                            <div id="DocumentResults"></div>
                            <script id="document-template" type="text/x-handlebars-template">
                                <table class="table-sm table-bordered table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                @{{{thsource}}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @{{#each this}}
                                            <tr>
                                                @{{{tdsource}}}
                                            </tr>
                                            @{{/each}}
                                        </tbody>
                                </table>
                            </script>
                        </div>
                      </div>
                   </div>
             </div>
       </div>
    </div>
 </div>
 @endsection

 @section('js')
 <script type="text/javascript">
    $(function(){
        $(document).on('click','#search_report',function(){



               var class_id = $('#class_id').val();
               var class_section_id = $('#class_section_id').val();
               var session_id = $('#session_id').val();
               var term = $('#term').val();

                if(class_id == ''| class_section_id == ''){
                    alert('All Fields are Required');
                    return;
                }

       $.ajax({
           type: 'GET',
           url : '{{route('payment_report.get-report')}}',
           data: {'class_id':class_id,'class_section_id':class_section_id,'session_id':session_id,'term':term},
           beforeSend: function(){

           },
           success: function(data){

                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
            $('[data-toggle="tooltip"]').tooltip();

           }
       });
       });

    });
    </script>
 @endsection
