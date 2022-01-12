@extends('layouts.header')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Students</h2>
            </div>
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-sm-12 bg-white p-4">
                        <table id="student_table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Roll Number</th>
                                    <th>Class</th>
                                    <th>English Score</th>
                                    <th>Maths Score</th>
                                    <th>Physics Score</th>
                                    <th>Chemistry Score</th>
                                    <th>Biology Score</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#student_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('students.list') }}",
                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "roll_number"
                    },
                    {
                        "data": "class"
                    },
                    {
                        "data": "english_score"
                    },
                    {
                        "data": "maths_score"
                    },
                    {
                        "data": "physics_score"
                    },
                    {
                        "data": "chemistry_score"
                    },
                    {
                        "data": "biology_score"
                    },
                    { "data": "image_path",
                    render: function( data, type, full, meta ) {
                        return "<img src=\"/studentImage/" + data + "\" height=\"50\"/>";
                    }
                },

                ]
            });
        });
    </script>
@endsection
