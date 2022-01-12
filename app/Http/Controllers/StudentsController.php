<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\StudentScore;
use DataTables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class StudentsController extends Controller
{
    /**
     * #desc Get student data from the table
     */
    function getData()
    {
        return view('liststudent');
    }

    /**
     * @desc student list in pagination/sorting
     */
    public function getStudents(Request $request)
    {
        $students = Student::join('student_scores', 'students.roll_number', '=', 'student_scores.roll_number')->select(['students.name', 'students.image_path', 'students.roll_number', 'students.class', 'student_scores.english_score', 'student_scores.maths_score', 'student_scores.physics_score', 'student_scores.chemistry_score', 'student_scores.biology_score']);
        return FacadesDataTables::of($students)->make(true);
    }

    /**
     * @desc display Add student form
     */
    function displayForm()
    {
        return view('addstudent');
    }

    /**
     * @desc Add student details to the table
     */
    function addData(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'roll_number' => 'required|unique:App\Models\Student',
            'class' => 'required',
        ], [
            'name.required' => 'Name is required',
            'roll_number.required' => 'Roll number is required',
            'roll_number.unique' => 'Roll number already existing. Please try another one.',
            'class.required' => 'class is required',
        ]);

        //Save student details
        $student = new Student;
        $student->name = $request['name'];
        $student->roll_number = $request['roll_number'];
        $student->class = $request['class'];
        if ($request->hasFile('image')) {
            $request->file('image');
            $student->image_path =  $student->roll_number . "_" . $request->file('image')->getClientOriginalName();
            $file = $request->file('image');
            $file->move(public_path('\studentImage'),  $student->roll_number . "_" . $file->getClientOriginalName());
        }
        $student->save();

        //Save student score to score table
        $studentScore = new StudentScore;
        $studentScore->roll_number = $request['roll_number'];
        $studentScore->english_score = $request['englishScore'];
        $studentScore->maths_score = $request['mathsScore'];
        $studentScore->physics_score = $request['physicsScore'];
        $studentScore->chemistry_score = $request['chemistryScore'];
        $studentScore->biology_score = $request['biologyScore'];
        $studentScore->save();

        return back()->with('success', 'Student data saved successfully.');
    }
}
