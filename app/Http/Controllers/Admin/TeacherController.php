<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public function __construct()
    {
        if(session('isLogin')!=true){
            abort(404);
        }
    }

    public function list(){
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'teacher' => '/admin/teacher',
            ]);
        $data = [];
        $data['title'] = 'Manage Teacher';
        $data['breadcrumb'] = $this->getBreadcrumb();

        $teachers = Teacher::paginate(10);
        $subjects = Subject::all();
        $data['teachers'] = $teachers;
        $data['subjects'] = $subjects;
        return view('admin.teacher', $data);
    }

    public function add(Request $request)
    {
        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->birthday = $request->birthday;
        $teacher->gender = $request->gender;
        $teacher->position = $request->position;
        $subject_ids = $request->subjects;

        $teacher->save();
        $teacher->subjects()->sync($subject_ids);

        return redirect('/admin/teacher')->with('message','Add Teacher Success');
    }

    public function edit(Request $request)
    {
        $teacher = Teacher::find($request->id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->birthday = $request->birthday;
        $teacher->gender = $request->gender;
        $teacher->position = $request->position;
        $subject_ids = $request->subjects;

        $teacher->save();
        $teacher->subjects()->sync($subject_ids);

        return redirect('/admin/teacher')->with('message','Add Teacher Success');
    }
}
