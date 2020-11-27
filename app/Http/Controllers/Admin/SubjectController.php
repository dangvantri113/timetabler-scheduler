<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubjectController extends Controller
{
    public function __construct()
    {
    }

    public function list(){


        if(session('isLogin')!=true){
            abort(404);
        }
        +$this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'subject' => '/admin/subject',
            ]);
        $data = [];
        $data['title'] = 'Manage Subject';
        $data['breadcrumb'] = $this->getBreadcrumb();

        $subjects = Subject::paginate(10);
//        dd($subjects);
    $data['subjects'] = $subjects;

        return view('admin.subject', $data);
    }

    public function add(Request $request)
    {
        $subject = new Subject;
        $subject->name = $request->name;
        $subject->number_hours = $request->number_hours;
        $subject->save();
        return redirect('/admin/subject')->with('message','Add Subject Success');
    }
    public function edit(Request $request)
    {
        $subject = Subject::find($request->id);

        $subject->name = $request->name;
        $subject->number_hours = $request->number_hours;
        $subject->save();

        return redirect('/admin/subject')->with('message','Edit Subject Success');
    }
    public function delete(Request $request)
    {
        $subject = Subject::find($request->id);
        $subject->delete();

        return redirect('/admin/subject')->with('message','Delete Subject Success');
    }
}
