<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klass;
use App\Models\Level;
use App\Models\Room;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KlassController extends Controller
{
    public function list(){
        if(session('isLogin')!=true){
            abort(404);
        }
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'klass' => '/admin/klass',
            ]);
        $data = [];
        $data['title'] = 'Manage Klass';
        $data['breadcrumb'] = $this->getBreadcrumb();

        $teachers = Teacher::all();
        $rooms = Room::all();
        $levels = Level::all();
        $klasses = Klass::paginate(10);

        $data['klasses'] = $klasses;
        $data['teachers'] = $teachers;
        $data['levels'] = $levels;
        $data['rooms'] = $rooms;

        return view('admin.klass', $data);
    }

    public function add(Request $request)
    {
        if(session('isLogin')!=true){
            abort(404);
        }
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
        if(session('isLogin')!=true){
            abort(404);
        }
        $klass = klass::find($request->id);

        $klass->name = $request->name;
        $klass->number_students = $request->number_students;
        $klass->level_id = $request->level_id;
        $klass->teacher_id = $request->teacher_id;
        $klass->room_id = $request->room_id;
        $klass->save();

        return redirect('/admin/klass')->with('message','Edit klass Success');
    }
    public function delete(Request $request)
    {
        if(session('isLogin')!=true){
            abort(404);
        }
        $klass = klass::find($request->id);
        $klass->delete();

        return redirect('/admin/klass')->with('message','Delete klass Success');
    }
}
