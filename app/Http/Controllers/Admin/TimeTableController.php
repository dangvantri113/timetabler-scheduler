<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Klass;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Array_;

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

    public function random()
    {
        if (session('isLogin') != true) {
            abort(404);
        }
        $title = "Manage Timetable";
        $data['title'] = $title;

        $klasses = Klass::all();
        $dates = ['HAI', 'BA', 'TU', 'NAM', 'SAU'];
        $units = [1, 2, 3, 4, 5, 6, 7, 9, 10];

        $matrix_time_table = [];
        foreach ($klasses as $klass) {
            $matrix_dates = [];
            foreach ($dates as $date) {
                $matrix_units = [];
                foreach ($units as $unit) {
                    $time_table = New TimeTable;
                    $time_table->klass_id = $klass->id;
                    $time_table->teacher_id = rand(1,40);
                    $time_table->subject_id = rand(1,23);
                    $time_table->save();

                    $matrix_units[$unit] = $time_table;
                }
                $matrix_dates[$date] = $matrix_units;
            }
            $matrix_time_table[$klass->id] = $matrix_dates;
        }

        dd($matrix_time_table);
        return view('admin.timetable.random', $data);
    }

    public function scheduling()
    {
        if (session('isLogin') != true) {
            abort(404);
        }
        $title = "Scheduling";
        $data['title'] = $title;
        $this->setBreadcrumb([
            'dashboard' => '/admin/dashboard',
            'add-admin' => '/admin/add-admin'
        ]);
        $data['breadcrumb'] = $this->getBreadcrumb();
        return view('admin.scheduling', $data);
    }

    public function doScheduling(Request $request)
    {
        if (session('isLogin') != true) {
            abort(404);
        }

        $ga_service = new GAService();
    }
}
