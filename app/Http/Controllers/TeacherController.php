<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeachersRequest;

class TeacherController extends Controller
{

    private  $sevice;
    public function __construct( TeacherService $teacherService)
    {
        $this->sevice = $teacherService;
    }
    public function index()
    {
        $users = $this->sevice->getListUsers();
        // $users = TeacherService::getListUsers();
        return view('teacher.listTeacher',  ['users'=>$users]);
    }

    public function sortTeacher(Request $request) {
        $users = $this->sevice->sortTeacherService($request->input('created_at'));
        return view('teacher.listTeacher',  ['users'=>$users["users"]]);
    }

    public function insertform()
    {
       
    }
    public function insert(TeachersRequest $request)
    {
        $this->sevice->insertService($request);
        return redirect()->back()->with('success', '');
        // return redirect()->back()->with('success', );
    }

    // Student edit
    public function updateform($id)
    {
        $users = Teacher::find($id);
        return response($users);
    }

    public function edit(TeachersRequest $request, $id)
    {
        $this->sevice->editService($request, $id);
        return redirect()->back()->with('success', '');
       
    }

    public function destroy($id)
    {
        $this->sevice->destroyService($id);
        return redirect()->back()->with('status', '');
    }

}
