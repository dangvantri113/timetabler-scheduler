<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoomController extends Controller
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
            'room' => '/admin/room',
            ]);
        $data = [];
        $data['title'] = 'Manage Room';
        $data['breadcrumb'] = $this->getBreadcrumb();

        $rooms = Room::paginate(10);
        $data['rooms'] = $rooms;

        return view('admin.room', $data);
    }

    public function add(Request $request)
    {
        $room = new Room;
        $room->name = $request->name;
        $room->save();
        return redirect('/admin/room')->with('message','Add Room Success');
    }
    public function edit(Request $request)
    {
        $room = Room::find($request->id);
        $room->name = $request->name;
        $room->save();

        return redirect('/admin/room')->with('message','Edit Room Success');
    }
    public function delete(Request $request)
    {
        $room = Room::find($request->id);
        $room->delete();

        return redirect('/admin/room')->with('message','Delete Room Success');
    }
}
