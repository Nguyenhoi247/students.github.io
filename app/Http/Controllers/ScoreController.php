<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    //
    public function index1()
    {
        
       
        $students = Student::all();

        $subjects = Subject::all();
        return view('score.score_index', [
            'students'=>$students,
            'subjects'=>$subjects,
        ]);
    }

    public function scoreform()
    {
        $students = Student::all();

        $subjects = Subject::all();
        return view('score.score_index', [
            'students'=>$students,
            'subjects'=>$subjects,
        ]);
        
        
    }

    public function score(Request $request)
    {
        // $student_id 
        // dd($request);
        // $users = Student::find($id);
        // dd($users);
        $student_id = $request->input('student_id');
        $subject_id = $request->input('subject_id');
        $score_point = $request->input('score_point');
        // $score_data = array(
        //     "score_point"=>$score_point,
        //      "student_id"=>$student_id,
        //       "subject_id"=>$subject_id
        //     );
        // dd($score_data);
        // Score::create($score_data);
        $score_data=Score::updateOrCreate([
            'score_point'=>$score_point,
            'student_id'=>$student_id,
            'subject_id'=>$subject_id
        ]);
        // dd($score_data);

        return redirect()->back()->with('status', 'xóa thành công');
        
    }
}
