@extends('layout.master')
@section('PageTitle', 'Issue Payment Invoice')
@section('content')


    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Payment Slip</h4>

                            </div>
                        </div>
                        <hr>
                        <div class="iq-card-body">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Student Type: <span class="text-danger">*</span></label>
                                    <select id="student_type" class="form-control form-control-sm" required>
                                        <option value=""></option>
                                        <option value="Returning">Regular Student</option>
                                        <option value="Fresh">Transfer Student</option>

                                    </select>
                                </div>
                            </div>

                            <form method="POST" id="returning" action="{{ route('invoice.generate') }}" target="__blank"
                                class="d-none">
                                @csrf

                                <div class="form-row">

                                    <div class="form-group col-md-2">
                                        <label>Class: <span class="text-danger">*</span></label>
                                        <select name="class_id" class="form-control form-control-sm" required>
                                            <option value=""></option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Class Section: <span class="text-danger">*</span></label>
                                        <select name="class_section_id" class="form-control form-control-sm" required>
                                            <option value=""></option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Date Due: <span class="text-danger">*</span></label>
                                        <input type="date" name="deadline" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form_group col-md-2" style="padding-top: 30px;">
                                        <button type="submit" class="btn btn-success btn-sm text-white">Generate</a>
                                    </div>
                                </div>
                            </form>

                            <form method="POST" id="fresh" action="{{ route('invoice.generate') }}" target="__blank"
                                class="d-none">
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

                                    <div class="form-group col-md-2">
                                        <label>Student</label>
                                        <select name="student_id" id="student_id" class="form-control form-control-sm" required>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Date Due</label>
                                        <input type="date" name="deadline" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form_group col-md-2" style="padding-top: 30px;">
                                        <button type="submit" class="btn btn-success btn-sm text-white">Generate</a>
                                    </div>
                                </div>
                            </form>

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
        $(function() {
            $(document).on('change', '#student_type', function() {


                var student_type = $('#student_type').val();

                if (student_type == 'Returning') {
                    $('#returning').removeClass('d-none');
                    $('#fresh').addClass('d-none');
                }

                if (student_type == 'Fresh') {
                    $('#fresh').removeClass('d-none');
                    $('#returning').addClass('d-none');
                }
            });
        });

    </script>


<script type="text/javascript">
    $(function() {
        $(document).on('change', '#class_section_id', function() {

            var class_id = $('#class_id').val();
            var class_section_id = $('#class_section_id').val();



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
