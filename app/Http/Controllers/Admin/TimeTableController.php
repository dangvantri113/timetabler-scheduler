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
    public function index()
    {
        if (session('isLogin') != true) {
            abort(404);
        }
        $title = "Manage Timetable";
        $data['title'] = $title;
        return view('admin.timetable', $data);
    }

    public function scheduling()
    {
        if (session('isLogin') != true) {
            abort(404);
        }
        $title = "Scheduling";
        $data['title'] = $title;

        return view('admin.scheduling',$data);
    }
    public function doScheduling(Request $request)
    {
        if (session('isLogin') != true) {
            abort(404);
        }

        $ga_service = new GAService();
    }
}
