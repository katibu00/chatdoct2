@extends('layout.master')
@section('PageTitle', 'Record Payment')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Record Payment</h4>

                            </div>
                        </div>
                        <hr>
                        <div class="iq-card-body">


                            <form method="POST" action="{{ route('record.payment.store') }}">
                                @csrf

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <select name="class_id" id="class_id" class="form-control form-control-sm"  data-control="select2" required>
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <select name="class_section_id" id="class_section_id"
                                            class="form-control form-control-sm" required>
                                            <option value="">Class Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <select name="student_id" id="student_id" class="form-control form-control-sm"
                                            required>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="number" placeholder="Enter Amount" name="amount" class="form-control" style="height: calc(1.5em + .5rem + 2px); padding: .25rem .5rem;  font-size: .875rem; line-height: 1.5; border-radius: .2rem" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <select name="method_id" class="form-control form-control-sm" required>
                                            <option value="">Payment Method</option>
                                            @foreach ($methods as $method)
                                                <option value="{{ $method->id }}">{{ $method->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <select name="description_id" class="form-control form-control-sm" required>
                                            <option value="">Payment Description</option>
                                            @foreach ($descriptions as $description)
                                                <option value="{{ $description->id }}">{{ $description->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form_group col-md-12" style="padding-top: 0px;">
                                        <button type="submit"
                                            class="btn btn-success btn-sm text-white mx-auto btn-block">Record Payment</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Recent Payments</h4>

                            </div>
                        </div>
                        <hr>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                @if($allPayment->count() > 0)
                                <table class="table table-striped table-bordered" style="font-size: 0.9em">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Students Name</th>
                                            <th>Amount</th>
                                            <th>Desription</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allPayment as $key => $v)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $v['student']['first_name'] }} {{ $v['student']['last_name'] }}</td>

                                                <td>&#8358;{{ number_format($v->amount, 2) }}</td>
                                                <td>{{ $v['description']['name'] }}</td>

                                                <td><a  class="btn btn-sm btn-info" href="{{route('payment_receipt.print-receipt')."?number=".$v->id}}" target="_blank">Receipt</a></td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                @else
                                <p>No Data Found</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @section('js')

        <script type="text/javascript">
            $(function() {
                $(document).on('change', '#class_section_id', function() {

                    var class_id = $('#class_id').val();
                    var class_section_id = $('#class_section_id').val();

                    if (class_id == '' | class_section_id == '') {
                        alert('All Fields are Required');
                        return;
                    }

                    $.ajax({
                        type: 'GET',
                        url: '{{ route('get-students') }}',
                        data: {
                            'class_id': class_id,
                            'class_section_id': class_section_id
                        },
                        success: function(data) {
                            var html = '<option value="">Select Student</option>';
                            $.each(data, function(key, v) {
                                html += '<option value="' + v.id + '">' + v.first_name +
                                    ' ' + [v.middle_name] + ' ' + [v.last_name] +
                                    '</option>';
                            });
                            html = $('#student_id').html(html);
                        }
                    });

                });

            });
        </script>
    @endsection
