@extends('layout.master')
@section('PageTitle', 'Students Transaction History')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Students Transaction History</h4>

                            </div>
                        </div>
                        <hr>
                        <div class="iq-card-body">


                            <form method="POST" action="{{ route('transaction.history.generate') }}" target="__blank">
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

                                    <div class="form_group col-md-2" style="padding-top: 32px;">
                                        <a id="search_history" class="btn btn-sm btn-primary text-white">Search</a>
                                        <button type="submit"  class="btn btn-sm btn-danger text-white ml-2"><i class="fa fa-download"></i> PDF</button>
                                     </div>


                                </div>

                                <div class="row d-none" id="marks-generate">
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
                                            <tbody id="marks-generate-tr">

                                            </tbody>
                                        </table>
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
        $(document).on('change', '#class_section_id', function() {

            var class_id = $('#class_id').val();
            var class_section_id = $('#class_section_id').val();

            if(class_id == ''| class_section_id == ''){
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

<script type="text/javascript">
    $(function() {
        $(document).on('click', '#search_history', function() {

            var student_id = $('#student_id').val();



            if(student_id == ''){
                    alert('All Fields are Required');
                    return;
                }


            $.ajax({
                type: 'GET',
                url: '{{ route('search-student-history') }}',
                data: {
                    'student_id': student_id

                },
                success: function(data) {
                    $('#marks-generate').removeClass('d-none');
                    var html = '';
                    $.each(data, function(key, v) {
                        html +=
                            '<tr>' +
                            '<td>' + (key+1) + '</td>' +
                            // '<td>' + v.session.name + '</td>' +
                            '<td>' + v.class.name + '</td>' +
                            '<td>' + v.term + '</td>' +
                            '<td>' + v.formattedDate + '</td>' +
                            '<td>' + v.amount + '</td>' +
                            '<td>' + v.description.name + '</td>' +
                            '<td>' + v.method.name + '</td>' +

                            '</tr>';
                    });
                    html = $('#marks-generate-tr').html(html);
                }
            });

        });

    });

</script>
@endsection
