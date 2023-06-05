<?php

namespace App\Http\Controllers;

// Illuminate
use App\Models\Score;
// use DB;
use App\Http\Requests;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\File;

use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;




class StudentController extends Controller
{
    public function index()
    {
        $users = Student::leftjoin('scores', 'students.id', '=',  'scores.student_id')
            ->leftjoin('subjects','scores.subject_id', '=',   'subjects.id')
            ->select('students.*',  'scores.score_point', 'subjects.subject_name', 'subjects.id as subject_id')
            ->orderBy('students.created_at', 'desc')
            ->get();
        return view('student.listTest2', ['users'=>$users]);
    }

    public function insertform()
    {
       
    }
    public function insert(Request $request)
    {
        $first_name = $request->input('first_name');

        $image_name = 'test.jpg';
        $image = 'test.jpg';
        // dd($request->all());
        if ($request->hasFile('image')) {

            // $image = $request->except('image');
            // dd($request->file('image'));
            $image = $request->file('image');
            // dd($image);
            $image_name = time() . '.' . $image->extension();
            Storage::disk('public')->put($image_name, $image);
        };

        $last_name = $request->input('last_name');
        $city_name = $request->input('city_name');
        $email = $request->input('email');
        $data = array('first_name' => $first_name, "last_name" => $last_name, "city_name" => $city_name, "email" => $email, 'image' => storage_path() . $image_name);
        Student::create($data);
        return redirect()->back()->with('status', 'thêm thành công')
            ->with('image', $image);
    }

    // Student edit
    public function updateform($id)
    {
        $users = Student::find($id);
        return response($users);
    }

    public function edit(Request $request, $id)
    {
        $users = Student::find($id);
        // $users = Student::where(['id'=>3]);
        $first_name = $request->input('first_name');



        $last_name = $request->input('last_name');
        $city_name = $request->input('city_name');
        $email = $request->input('email');
        $data = array('users' => $users, 'first_name' => $first_name, 'last_name' => $last_name, 'city_name' => $city_name, 'email' => $email);
        $users->update($data);
        return redirect()->back()->with('status', 'sửa thành công');

        // echo 'thêm sửa thành công';
    }


    // Student Delete

    public function deleteform($id)
    {
        $users = Student::find($id);
        return view('student.list', ['users' => $users]);
    }

    public function destroy($id)
    {
        $users = Student::where('id', $id)->delete();
        return redirect()->back()->with('status', 'xóa thành công');
    }
}
