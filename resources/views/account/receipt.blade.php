@extends('layout.master')
@section('PageTitle', 'Issue Payment Receipt')
@section('content')


<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">
                           Issue Payment Receipt
                         </div>

                 </div>
                      <hr>
                 <div class="iq-card-body col-md-12 mx-auto">


                                <div class="form-row">

                                   <div class="col-sm-3">
                                    <label>Payment Date:</label>
                                        <select class="form-control form-control-sm" id="date" required>
                                            <option selected="" value="">Select Item</option>
                                            <option value="0">Today</option>
                                            <option value="5">Last 5 Days</option>
                                            <option value="10">Last 10 Days</option>
                                            <option value="15">Last 15 Days</option>
                                            <option value="30">Last 30 Days</option>
                                            <option value="90">Last 90 Days</option>

                                        </select>
                                        <input type="hidden" id="school_id" value="{{$school_id}}">
                                        <input type="hidden" id="session_id" value="{{$session}}">
                                        <input type="hidden" id="term" value="{{$term}}">
                                    </div>

                                   <div class="form_group col-md-2" style="padding-top: 32px;">
                                      <a id="search_receipt" class="btn btn-sm btn-success text-white" name="search_receipt">Search</a>
                                   </div>
                                </div>


                         <br>

                         <div class="card-body">
                            <div id="DocumentResults"></div>
                            <script id="document-template" type="text/x-handlebars-template">
                                <div class="table-responsive">
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
                                </div>
                            </script>
                        </div>
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
        $(document).on('click','#search_receipt',function(){



               var date = $('#date').val();
               var school_id = $('#school_id').val();
               var session_id = $('#session_id').val();
               var term = $('#term').val();


       $.ajax({
           type: 'GET',
           url : '{{route('payment_receipt.get-receipt')}}',
           data: {'date':date,'session_id':session_id,'school_id':school_id,'term':term},
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
