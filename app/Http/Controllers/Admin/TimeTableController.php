<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Klass;
use App\Models\TimeTable;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        TimeTable::truncate();
        $klasses = Klass::all();
        $dates = ['HAI', 'BA', 'TU', 'NAM', 'SAU'];
        $units = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        $matrix_time_table = [];
        foreach ($klasses as $klass) {
            $matrix_dates = [];
            foreach ($dates as $date) {
                $matrix_units = [];
                foreach ($units as $unit) {
                    $time_table = new TimeTable;
                    $time_table->klass_id = $klass->id;
                    $time_table->teacher_id = rand(1, 40);
                    $time_table->subject_id = rand(1, 23);
                    $time_table->hour = $unit;
                    $time_table->date = $date;
                    $time_table->save();

                    $matrix_units[$unit] = $time_table;
                }
                $matrix_dates[$date] = $matrix_units;
            }
            $matrix_time_table[$klass->id] = $matrix_dates;
        }
        return redirect('/admin/scheduling',)->with('message','Random done');
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
            'add-admin' => '/admin/scheduling'
        ]);
        $data['breadcrumb'] = $this->getBreadcrumb();
        return view('admin.scheduling', $data);
    }

    public function exportExcel()
    {
        if (session('isLogin') != true) {
            abort(404);
        }

        $spreadsheet = new Spreadsheet();

        $klasses = Klass::all();
        $dates = ['HAI', 'BA', 'TƯ', 'NĂM', 'SÁU'];
        $dates_for_export = [
            ['HAI'],
            ['BA'],
            ['TƯ'],
            ['NĂM'],
            ['SÁU']
        ];
        $time_tables = TimeTable::all();
        $arrayData = [];
        foreach ($klasses as $klass) {
            $time_table_of_class = $time_tables->where('klass_id', '=', $klass->id);
            $arrayData[$klass->level->name . $klass->name] = [];
            foreach ($dates as $date) {
                $time_table_of_class_of_date = $time_table_of_class->where('date', '=', $date);
                $time_table_of_class_of_date_for_export = [];
                foreach ($time_table_of_class_of_date as $item_time){
                    $time_table_of_class_of_date_for_export[$item_time->hour] = $item_time->subject->name;
                }
                for($i=1;$i<=10;$i++){
                    if (!isset($time_table_of_class_of_date_for_export[$i])){
                        $time_table_of_class_of_date_for_export[$i] = '----';
                    }
                }
                ksort($time_table_of_class_of_date_for_export);
                $arrayData[$klass->level->name . $klass->name] [] = $time_table_of_class_of_date_for_export;
            }
        }
        $units = [
            'Tiết 1',
            'Tiết 2',
            'Tiết 3',
            'Tiết 4',
            'Tiết 5',
            'Tiết 6',
            'Tiết 7',
            'Tiết 8',
            'Tiết 9',
            'Tiết 10'
        ];
        $i = 1;
        foreach ($arrayData as $class => $time_table) {
            $spreadsheet->getActiveSheet()
                ->setCellValue(
                    'A' . (string)($i + 3), $class);
            $spreadsheet->getActiveSheet()
                ->fromArray(
                    $units, NULL, 'C' . (string)($i));

            $spreadsheet->getActiveSheet()
                ->fromArray(
                    $dates_for_export, NULL, 'B' . (string)(++$i));

            $spreadsheet->getActiveSheet()
                ->fromArray(
                    $time_table, NULL, 'C' . (string)($i));

            $i += 12;

        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('time-table.xlsx');

        return response()->download('time-table.xlsx');
    }

    public function view(){
        $this->setBreadcrumb([
            'admin' => '/admin/dashboard',
            'time-table' => '/admin/show-time-table'
        ]);
        $data['breadcrumb'] = $this->getBreadcrumb();
        $klasses = Klass::all();
        $data['title'] = 'Lập lịch';
        $data['klasses'] = $klasses;
        return view('admin.timetable',$data);
    }
}
