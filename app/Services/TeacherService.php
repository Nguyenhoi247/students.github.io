<?php 

namespace App\Services;
use App\Models\Teacher;
use App\Http\Requests\TeachersRequest;
use Carbon\Carbon;

class TeacherService
{
    
    public static function getListUsers()
    {

        $users = Teacher::select('*')
                ->orderBy('teachers.created_at', 'desc')
                ->get();

        return $users;
    }

    public static function sortTeacherService($created_at) 
    {
        // dd($created_at);
        $users = Teacher::select('*')
        ->where('teachers.created_at', '>=', $created_at = Carbon::parse($created_at)->format('Y-m-d H:i:s'))
        ->orderBy('teachers.created_at', 'asc')
        ->get();
        

        dd($users);

        // return $users;
        return ['users'=> $users,
                'created_at' => $created_at];
    }

    public static function insertformService()
    {
       
    }
    public static function insertService(TeachersRequest $request)
    {
        // $validator = $this->validator($request->all());
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $data = array('first_name' => $first_name, "last_name" => $last_name, "email" => $email);
        Teacher::create($data);
        // return view('teacher.listTeacher');
        // return redirect()->back()->with('success', 'thêm thành công');
        return redirect()->back()->with('success', );
        // return redirect('teacher.create2');
    }

    // Student edit
    public static function updateformService($id)
    {
        $users = Teacher::find($id);
        return response($users);
    }

    public static function editService(TeachersRequest $request, $id)
    {
        $users = Teacher::find($id);
        // $users = Teacher::where('id',$id)->first();

        // dd($users);

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $data = array('users' => $users, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email);
        // dd($data);
        // $users = Teacher::whrere($id)->updateOrinsert($data);
        $users->update($data);
        return redirect()->back()->with('success', '');
        // return redirect("update2/".$users->id);

        // echo 'thêm sửa thành công';
    }


    // Student Delete

    public static function deleteformService($id)
    {
        $users = Teacher::find($id);
        return $users;
    }

    public static function destroyService($id)
    {
        $users = Teacher::where('id', $id)->delete();
        return $id;
    }

   

}