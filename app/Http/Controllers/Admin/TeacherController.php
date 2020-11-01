<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function list(){
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'teacher' => '/admin/teacher',
            ]);
        $data = [];
        $data['title'] = 'Manage Teacher';
        $data['breadcrumb'] = $this->getBreadcrumb();

        $teachers = Teacher::with('klass')->get();
        $data['teachers'] = $teachers;
        return view('admin.teacher', $data);
    }

    public function detail($id)
    {
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'teacher' => '/admin/teacher',
            'detail'=> 'admin/teacher/detail'
        ]);
        $data = [];
        $data['title'] = 'Add Admin';
        $data['breadcrumb'] = $this->getBreadcrumb();
        return view('admin.admins', $data);
    }


    public function add(Request $request)
    {
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'teacher' => '/admin/teacher'
        ]);
        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->birthday = $request->birthday;
        $teacher->gender = $request->gender;
        $teacher->class_id = $request->class;
        $teacher->position = $request->position;
        $teacher->save();
        return redirect('/admin/teacher')->with('message','Add Teacher Success');
    }
}
