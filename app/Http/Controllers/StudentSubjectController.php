<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    //

    public function studentSubject($id)
    {
        $subjects = Subject::join('scores', 'subjects.id', '=', 'scores.subject_id')
        ->join('students', 'scores.student_id', '=', 'students.id')
        ->where('students.id',$id)
        ->orderBy('scores.score_point', 'desc')
        ->select('subjects.subject_name', 'students.last_name', 'students.first_name', 'scores.score_point')
        ->get();

        // $subjects = Subject::all();

        return view('student_subject.studentSubject',[
            'subjects'=>$subjects,
        ],
    );
    }
}
