<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function get(int $id)
    {

        if (session('isLogin') != true) {
            abort(404);
        }



        $teacher = Teacher::find($id);
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'teacher' => '/admin/teacher',
            'detail' => '/admin/teacher/detail/'.$teacher->id,
        ]);
        $data = [];
        $data['title'] = 'Detail Teacher';
        $data['breadcrumb'] = $this->getBreadcrumb();
        $data['teacher'] =$teacher;
        return view('component.teacher.detail', $data);
    }

    public function list()
    {

        if (session('isLogin') != true) {
            abort(404);
        }

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

        if (session('isLogin') != true) {
            abort(404);
        }

        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->birthday = $request->birthday;
        $teacher->gender = $request->gender;
        $teacher->position = $request->position;
        $subject_ids = $request->subjects;

        $teacher->save();
        $teacher->subjects()->sync($subject_ids);

        return redirect('/admin/teacher')->with('message', 'Add Teacher Success');
    }

    public function edit(Request $request)
    {

        if (session('isLogin') != true) {
            abort(404);
        }

        $teacher = Teacher::find($request->id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->birthday = $request->birthday;
        $teacher->gender = $request->gender;
        $teacher->position = $request->position;
        $subject_ids = $request->subjects;

        $teacher->save();
        $teacher->subjects()->sync($subject_ids);

        return redirect('/admin/teacher')->with('message', 'Add Teacher Success');
    }
}
