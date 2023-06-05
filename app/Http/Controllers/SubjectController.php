<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //

    public function test()
    { 
        $subjects = Subject::orderBy('created_at', 'desc')->get();
        return view('subject.subject_list', ['subjects' => $subjects]);
    }
    
    public function subjectform()
    {
        $subjects = Subject::all();
        return view('subject.subject_index',['subjects'=>$subjects]);
    }
    public function subject(Request $request)
    {
        
        $subject_name = $request->input('subject_name');
        $subject_data = array( "subject_name" => $subject_name);
        
        Subject::create($subject_data);
        // return view('subject.subject_list');
        return redirect()->back()->with('status', 'thêm thành công');
        
    }


    public function test1($id)
    { 
        $subjects = Subject::join('scores', 'subjects.id', '=', 'scores.subject_id')
        ->join('students', 'scores.student_id', '=', 'students.id')
        ->where('subjects.id',$id)
        ->select('subjects.subject_name', 'students.last_name', 'students.first_name', 'scores.score_point')
        ->orderBy('scores.score_point', 'desc')
        ->get();
        // dd($subjects);

    
       
        
        // if ('id'=='subject_name') {
            
        // }else {

        // };
        return view('subject.subject_student_list',
            ['subjects' => $subjects,
            ],
           );
        
        // dd($subjects);
       
    }
    
    public function subjectst(Request $request)
    {
        
        
        $subject_name = $request->input('subject_name');
        $subject_data = array( "subject_name" => $subject_name);
        
        
        
        Subject::create($subject_data);
        // return view('subject.subject_list');
        return redirect()->back()->with('status', 'thêm thành công');
        
    }
    
    
    
}
