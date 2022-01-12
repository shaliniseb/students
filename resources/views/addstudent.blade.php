@extends('layouts.header')
@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Add Student</h2>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6 bg-white p-4">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <form class="needs-validation" novalidate method="POST" action="{{ route('student.add') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-12 ">
                                    <label for="name" class="form-label ">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter student name"
                                        value="{{ old('name') }}" required>
                                    <div class="invalid-feedback">
                                        Valid name is required.
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="roll_number" class="form-label">Roll Number</label>
                                    <input type="text" class="form-control" id="roll_number" name="roll_number"
                                        placeholder="Enter roll number" value="{{ old('roll_number') }}" required>
                                    <div class="invalid-feedback">
                                        Valid roll number is required.
                                    </div>
                                    @error('roll_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="englishScore" class="form-label">Score for English</label>
                                    <input type="number" class="form-control" id="englishScore" name="englishScore"
                                        placeholder="Enter score for English" value="{{ old('englishScore') }}" required>
                                    <div class="invalid-feedback">
                                        Valid score is required.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="mathsScore" class="form-label">Score for Maths</label>
                                    <input type="number" class="form-control" id="mathsScore" name="mathsScore"
                                        placeholder="Enter score for Maths" value="{{ old('mathsScore') }}" required>
                                    <div class="invalid-feedback">
                                        Valid score is required.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="physicsScore" class="form-label">Score for Physics</label>
                                    <input type="number" class="form-control" id="physicsScore" name="physicsScore"
                                        placeholder="Enter score for Physics" value="{{ old('physicsScore') }}" required>
                                    <div class="invalid-feedback">
                                        Valid score is required.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="chemistryScore" class="form-label">Score for Chemistry</label>
                                    <input type="number" class="form-control" id="chemistryScore" name="chemistryScore"
                                        placeholder="Enter score for Chemistry" value="{{ old('chemistryScore') }}" required>
                                    <div class="invalid-feedback">
                                        Valid score is required.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="biologyScore" class="form-label">Score for Biology</label>
                                    <input type="number" class="form-control" id="biologyScore" name="biologyScore"
                                        placeholder="Enter score for Biology" value="{{ old('biologyScore') }}" required>
                                    <div class="invalid-feedback">
                                        Valid score is required.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="image" class="form-label">Image</label>
                                    <div class="input-group has-validation">
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="Username" required>
                                        <div class="invalid-feedback">
                                            Image is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="class" class="form-label">Class</label>
                                    <select class="form-select form-control" id="class" name="class" required>
                                        <option value="">Select...</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor

                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid class.
                                    </div>
                                </div>
                                <hr class="my-4">
                                <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ url('js/form-validation.js') }}"></script>
@endsection
