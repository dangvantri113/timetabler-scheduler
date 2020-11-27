<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Subject;
use App\Models\SubjectLevel;
use Illuminate\Http\Request;

class SubjectLevelController extends Controller
{
    public function __construct()
    {
    }

    public function list()
    {


        if (session('isLogin') != true) {
            abort(404);
        }
        +$this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'subject-level' => '/admin/subject-level',
        ]);
        $data = [];
        $data['title'] = 'Manage Subject Level';
        $data['breadcrumb'] = $this->getBreadcrumb();

        $subject_levels = SubjectLevel::paginate(10);
        $subjects = Subject::all();
        $levels = Level::all();
        $data['subject_levels'] = $subject_levels;
        $data['subjects'] = $subjects;
        $data['levels'] = $levels;

        return view('admin.subject-level', $data);
    }

    public function add(Request $request)
    {
        $subject = new SubjectLevel;
        $subject->subject_id = $request->subject_id;
        $subject->level_id = $request->level_id;
        $subject->units = $request->units;
        $subject->save();
        return redirect('/admin/subject-level')->with('message', 'Add Subject Success');
    }

    public function edit(Request $request)
    {
        $subject = SubjectLevel::find($request->id);

        $subject->subject_id = $request->subject_id;
        $subject->level_id = $request->level_id;
        $subject->units = $request->units;
        $subject->save();

        return redirect('/admin/subject-level')->with('message', 'Edit Subject Level Success');
    }

    public function delete(Request $request)
    {
        $subject = SubjectLevel::find($request->id);
        $subject->delete();

        return redirect('/admin/subject-level')->with('message', 'Delete Subject Level Success');
    }
}
