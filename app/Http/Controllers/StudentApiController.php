<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $select = array();
        $where = array();

        //if request has data the separte the value and set select parameters else set select query for fetching all data
        if ($request->has('data')) {
            $selectUrlParam = explode(',', $request['data']);
            if (!empty($selectUrlParam)) {
                foreach ($selectUrlParam as $key => $value) {

                    //based on the url value set select statement
                    switch ($value) {
                        case 'name':
                            $select[] = 'students.name';
                            break;
                        case 'roll':
                            $select[] = 'students.roll_number';
                            break;
                        case 'score total':
                            $select[] = DB::raw('(english_score+maths_score+physics_score + chemistry_score + biology_score) as totalScore');
                            break;
                        case 'class':
                            $select[] = 'students.class';
                            break;
                        default:
                            $select = array('students.name', 'students.class', DB::raw("CONCAT('" . public_path('\studentImage') . "',students.image_path) AS image_url"), DB::raw('(english_score+maths_score+physics_score + chemistry_score + biology_score) as totalScore, student_scores.roll_number,english_score as english,maths_score as maths,physics_score as physics,chemistry_score as chemistry,biology_score as biology'));
                            break;
                    }
                }
            } else {
                $select = array('students.name', 'students.class', DB::raw("CONCAT('" . public_path('\studentImage') . "',students.image_path) AS image_url"), DB::raw('(english_score+maths_score+physics_score + chemistry_score + biology_score) as totalScore, student_scores.roll_number,english_score as english,maths_score as maths,physics_score as physics,chemistry_score as chemistry,biology_score as biology'));
            }
        } else {
            $select = array('students.name', 'students.class', DB::raw("CONCAT('" . public_path('\studentImage') . "',students.image_path) AS image_url"), DB::raw('(english_score+maths_score+physics_score + chemistry_score + biology_score) as totalScore, student_scores.roll_number,english_score as english,maths_score as maths,physics_score as physics,chemistry_score as chemistry,biology_score as biology'));
        }

        //if the request has class the fetch data only from the given class
        if ($request->has('class')) {
            $where = array('students.class' => $request['class']);
        }

        $topResult = DB::table('students')
            ->join('student_scores', 'students.roll_number', '=', 'student_scores.roll_number')
            ->select($select)
            ->where($where)
            ->get();
        return $topResult;
    }
}
