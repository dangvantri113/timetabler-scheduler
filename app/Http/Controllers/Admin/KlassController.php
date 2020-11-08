<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klass;
use App\Models\Room;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KlassController extends Controller
{
    public function list(){
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'klass' => '/admin/klass',
            ]);
        $data = [];
        $data['title'] = 'Manage Klass';
        $data['breadcrumb'] = $this->getBreadcrumb();

        $teachers = Teacher::all();
        $rooms = Room::all();
        $klasses = Klass::paginate(10);

        $data['klasses'] = $klasses;
        $data['teachers'] = $teachers;
        $data['rooms'] = $rooms;

        return view('admin.klass', $data);
    }

    public function add(Request $request)
    {
        $klass = new Klass;
        $klass->name = $request->name;
        $klass->number_students = $request->number_students;
        $klass->room_id = $request->room_id;
        $klass->teacher_id = $request->teacher_id;
        $klass->save();

        return redirect('/admin/klass')->with('message','Add klass Success');
    }
    public function edit(Request $request)
    {
        $klass = klass::find($request->id);

        $klass->name = $request->name;
        $klass->number_students = $request->number_students;
        $klass->teacher_id = $request->teacher_id;
        $klass->number_students = $request->room_id;
        $klass->save();

        return redirect('/admin/klass')->with('message','Edit klass Success');
    }
    public function delete(Request $request)
    {
        $klass = klass::find($request->id);
        $klass->delete();

        return redirect('/admin/klass')->with('message','Delete klass Success');
    }
}
