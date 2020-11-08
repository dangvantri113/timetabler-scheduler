<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TimeTableController extends Controller
{
    public function __construct()
    {
        if(session('isLogin')!=true){
            abort(404);
        }
    }

    public function index(){
        $title = "Manage Timetable";
        $data['title'] = $title;
        return view('admin.timetable',$data);
    }
}
