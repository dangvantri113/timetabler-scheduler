<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chromosome;
use App\Models\Gen;
use App\Models\Klass;
use App\Models\Level;
use App\Models\Subject;
use App\Models\SubjectLevel;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Database\Eloquent\Collection;

class GAController
{
    /** @var Chromosome[] */
    private $population;
    private $subjects;
    private $teachers;
    private $selection;
    /**
     * @var array
     */
    private $crossOver;

    public function doScheduling1()
    {
//        $this->initEmptyPopulation();
        $klasses = Klass::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $dates = ['HAI', 'BA', 'TU', 'NAM', 'SAU'];
        $units = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $population = [];

        $time_table = $this->initEmptyTimeTable($subjects, $teachers, $klasses, $dates, $units);
        $time_table = $this->fillInfoTimeTable($time_table, $klasses, $teachers, $subjects);
        $this->saveDatabase($time_table);
        return redirect('admin/timetable/view');
        /**
         * Todo GA
         */
//        $classes = Klass::all();
//        $teachers = Teacher::all();
//        $subjects = Subject::all();
//        $this->subjects = $subjects;
//        foreach ($subjects as $subject) {
//            $this->totalUnit += $subject->number_hours;
//        }
//        $this->emptySlot = $this->totalTimeSlot - $this->totalUnit;
//        if ($this->emptySlot < 0) {
//            abort(500);
//        }
//        $this->initPopulation($classes, $teachers, $subjects, $this->emptySlot, 100);
//
//        $times = 0;
//
//        do {
//            $times++;
//            $this->considerFitness();
//            $new_population_selected = $this->selection();
//            $this->crossOver();
//            $this->makeNewPopulation();
//            $this->makeMutant();
//        } while ($times < 1);
//
//        $data = $this->population[0]->gens;
//        return view('admin.timetable2', ['data' => $data, 'classes' => $classes, 'title' => 'TKB']);
    }

    public function doScheduling()
    {
        $klasses = Klass::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $dates = ['HAI', 'BA', 'TU', 'NAM', 'SAU'];
        $units = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        //khoi tao quan the ban dau
        echo 'vui lòng chờ.....';
        $population = [];
        for ($i = 0; $i < 20; $i++) {
            $time_table = $this->initEmptyTimeTable($subjects, $teachers, $klasses, $dates, $units);
            $time_table = $this->fillInfoTimeTable($time_table, $klasses, $teachers, $subjects);
            $population[] = $time_table;
        }
        // đánh giá độ thích nghi của mỗi nhiễm sắc thề và sắp xếp theo độ thích nghi
        for ($i = 0; $i < 20; $i++) {
            usort($population, [$this, 'soSanhGiaDoThichNghi']);

            //chon ra 5 nst tot nhat
            $selections = array_slice($population, 0, 10);
            // lai tao 50 nst tu 50 nst duoc chon
            $selections = $this->laiTao($selections);
            $dot_biens = $this->dotBien($selections, $teachers);
            $population = array_merge($selections, $dot_biens);
        }


        usort($population, [$this, 'soSanhGiaDoThichNghi']);
        $this->saveDatabase($population[0]);
        return redirect('/admin/timetable/view');
        /**
         * Todo GA
         */
//        $classes = Klass::all();
//        $teachers = Teacher::all();
//        $subjects = Subject::all();
//        $this->subjects = $subjects;
//        foreach ($subjects as $subject) {
//            $this->totalUnit += $subject->number_hours;
//        }
//        $this->emptySlot = $this->totalTimeSlot - $this->totalUnit;
//        if ($this->emptySlot < 0) {
//            abort(500);
//        }
//        $this->initPopulation($classes, $teachers, $subjects, $this->emptySlot, 100);
//
//        $times = 0;
//
//        do {
//            $times++;
//            $this->considerFitness();
//            $new_population_selected = $this->selection();
//            $this->crossOver();
//            $this->makeNewPopulation();
//            $this->makeMutant();
//        } while ($times < 1);
//
//        $data = $this->population[0]->gens;
//        return view('admin.timetable2', ['data' => $data, 'classes' => $classes, 'title' => 'TKB']);
    }

    public function randomChromosome(
        Collection $classes,
        Collection $subjects,
        Collection $teachers,
        int $number_empty_slots)
    {
        $count_time_slots = 50;
        $count_classes = count($classes);
        $count_teachers = count($teachers);
        $count_subjects = count($subjects);
        $gens = [];
        for ($i = 0; $i < $count_time_slots; $i++) {
            for ($j = 0; $j < $count_classes; $j++) {
                $gens[$i][] = new Gen(
                    $i,
                    $classes[$j],
                    $teachers[rand(0, $count_teachers - 1)],
                    $subjects[rand(0, $count_subjects - 1)],
                );
            }
        }
        for ($i = 0; $i < $count_classes; $i++) {
            $empty_slots = $number_empty_slots;
            while ($empty_slots > 0) {
                $rand_time_slot = rand(0, $count_time_slots - 1);
                if ($gens[$rand_time_slot][$i] != null) {
                    $gens[$rand_time_slot][$i] = null;
                    $empty_slots--;
                }
            }
        }

        return new Chromosome($gens);
    }

    private function initEmptyPopulation()
    {
        $klasses = Klass::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $dates = ['HAI', 'BA', 'TU', 'NAM', 'SAU'];
        $units = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $population = [];

        $time_table = $this->initEmptyTimeTable($subjects, $teachers, $klasses, $dates, $units);
        $time_table = $this->fillInfoTimeTable($time_table, $klasses, $teachers, $subjects);
        $this->saveDatabase($time_table);

    }

    private function makeLevelTimeTable($dates, $units, $total_units, $firstIsChaoCo)
    {
        $empty_time_table_lv = [];
        $normal_units = intdiv($total_units, count($dates));
        $rest_units = $total_units % count($dates);
        if ($firstIsChaoCo) {
            foreach ($dates as $date) {
                $empty_date_table_lv = [];
                for ($i = 1; $i <= $normal_units; $i++) {
                    $time_table = new TimeTable;
                    $time_table->hour = $i;
                    $time_table->date = $date;
                    $empty_date_table_lv[] = $time_table;
                }
                if ($rest_units > 0) {
                    $time_table = new TimeTable;
                    $time_table->hour = $normal_units + 1;
                    $time_table->date = $date;
                    $empty_date_table_lv [] = $time_table;
                    $rest_units--;

                } else {
                    $empty_date_table_lv [] = null;

                }
                for ($i = $normal_units + 2; $i <= 10; $i++) {
                    $empty_date_table_lv [] = null;
                }
                $empty_time_table_lv[] = $empty_date_table_lv;
            }

        } else {
            foreach ($dates as $date) {
                $empty_date_table_lv = [];
                for ($i = 1; $i <= 9 - $normal_units; $i++) {
                    $empty_date_table_lv[] = null;
                }
                if ($rest_units > 0) {
                    $time_table = new TimeTable;
                    $time_table->hour = 10 - $normal_units;
                    $time_table->date = $date;
                    $empty_date_table_lv [] = $time_table;
                    $rest_units--;
                } else {
                    $empty_date_table_lv [] = null;
                }
                for ($i = 11 - $normal_units; $i <= 10; $i++) {
                    $time_table = new TimeTable;
                    $time_table->hour = $i;
                    $time_table->date = $date;
                    $empty_date_table_lv [] = $time_table;
                }
                $empty_time_table_lv[] = $empty_date_table_lv;
            }
        }
        return $empty_time_table_lv;
    }

    private function initEmptyTimeTable($subjects, $teachers, $klasses, $dates, $units)
    {
        $time_table = [];
        $subject_level = SubjectLevel::all();
        $total_unit_lv_1 = $subject_level->where('level_id', '1')->sum('units');
        $total_unit_lv_2 = $subject_level->where('level_id', '2')->sum('units');
        $total_unit_lv_3 = $subject_level->where('level_id', '3')->sum('units');
        $total_unit_lv_4 = $subject_level->where('level_id', '4')->sum('units');
        $total_unit_lv_5 = $subject_level->where('level_id', '5')->sum('units');
        $dates = ['HAI', 'BA', 'TU', 'NAM', 'SAU'];
        $units = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        foreach ($klasses as $klass) {
            switch ($klass->level_id) {
                case 1:
                    $time_table[$klass->id] = $this->makeLevelTimeTable($dates, $units, $total_unit_lv_1, true);;
                    break;
                case 2:
                    $time_table[$klass->id] = $this->makeLevelTimeTable($dates, $units, $total_unit_lv_2, false);
                    break;
                case 3:
                    $time_table[$klass->id] = $this->makeLevelTimeTable($dates, $units, $total_unit_lv_3, true);
                    break;
                case 4:
                    $time_table[$klass->id] = $this->makeLevelTimeTable($dates, $units, $total_unit_lv_4, false);
                    break;
                case 5:
                    $time_table[$klass->id] = $this->makeLevelTimeTable($dates, $units, $total_unit_lv_5, true);
                    break;
            }
        }
        return $time_table;
    }

    public function initPopulation(
        Collection $classes,
        Collection $teachers,
        Collection $subjects,
        int $number_empty_slots,
        int $quantity)
    {
        for ($i = 0; $i < $quantity; $i++) {
            $this->population[$i] = $this->randomChromosome(
                $classes,
                $subjects,
                $teachers,
                $number_empty_slots
            );
        }
    }

    private function considerFitness()
    {
        $array_fitness = [];
        foreach ($this->population as $chromosome) {
            $array_fitness[] = $chromosome->calculateFitness($this->subjects);
        }
        return $array_fitness;
    }

    private function getScore($a, $b)
    {
        return $a->getScore() - $b->getScore();
    }

    private function selection()
    {
        $quantity = count($this->population);
        $selection = $this->population;
        for ($i = 0; $i < $quantity; $i++) {
            usort($selection, array($this, "getScore"));
        }

        $selection = array_slice($selection, 0, 50);
        $this->selection = $selection;
        return $selection;
    }

    private function crossOver()
    {
        $crossOver = [];
        for ($i = 0; $i < 50; $i += 2) {
            $a1 = array_slice($this->selection[$i]->gens, 0, 25);
            $a2 = array_slice($this->selection[$i]->gens, 25, 25);
            $a3 = array_slice($this->selection[$i]->gens, 0, 25);
            $a4 = array_slice($this->selection[$i]->gens, 25, 25);

            $crossOver[] = new Chromosome(array_merge($a1, $a4));
            $crossOver[] = new Chromosome(array_merge($a3, $a2));
        }
        $this->crossOver = $crossOver;
        return $crossOver;
    }

    private function makeMutant()
    {
        for ($i = 0; $i < 5; $i++) {
            $a = rand(0, 99);
            $b = rand(0, 49);
            $c = rand(0, 49);
            $temp = $this->population[$a]->gens[$b];
            $this->population[$a]->gens[$b] = $this->population[$a]->gens[$c];
            $this->population[$a]->gens[$c] = $temp;
        }
    }

    private function makeNewPopulation()
    {
        $this->population = array_merge($this->selection, $this->crossOver);
    }

    private function fillInfoTimeTable(array $time_table, $klasses, $teachers, $subjects)
    {
        foreach ($time_table as $klass_id => $time_table_class) {
            $time_table[$klass_id] = $this->addSubject($klass_id, $time_table_class, $klasses, $teachers, $subjects);
        }
        return $time_table;
    }

    private function addSubject($klass_id, $time_table_class, $klasses, $teachers, $subjects)
    {
        $teacher_id = $klasses->find($klass_id)->teacher_id;
        $teacher = $teachers->find($teacher_id);
        $gvcn_subjetcts = $teacher->subjects->pluck('id')->toArray();
        $klass = $klasses->find($klass_id);
        $level_id = $klass->level_id;
        $start = 0;
        if ($time_table_class[0][0] != null) {
            for ($i = 9; $i > 0; $i--) {
                if ($time_table_class[4][$i] != null) {
                    $time_table_class[4][$i]->subject_id = 17;
                    $time_table_class[4][$i]->klass_id = $klass_id;
                    $time_table_class[4][$i]->teacher_id = $teacher_id;
                    break;
                }
            }
        } else {
            $start = 9;
            $time_table_class[4][$start]->subject_id = 17;
            $time_table_class[4][$start]->klass_id = $klass_id;
            $time_table_class[4][$start]->teacher_id = $teacher_id;
        }
        $time_table_class[0][$start]->subject_id = 7;
        $time_table_class[0][$start]->klass_id = $klass_id;
        $time_table_class[0][$start]->teacher_id = $teacher_id;
        $subject_levels = SubjectLevel::where('level_id', $level_id)->where('subject_id', '!=', 7)->where('subject_id', '!=', 17)->get()->shuffle();

        foreach ($subject_levels as $subject_level) {
            for ($i = 0; $i < $subject_level->units; $i++) {
                foreach ($time_table_class as $time_table_class_date) {
                    $break = false;
                    foreach ($time_table_class_date as $item) {
                        if ($item != null && $item->subject_id == null) {
                            $item->klass_id = $klass_id;
                            $item->subject_id = $subject_level->subject_id;
                            if (in_array($item->subject_id, $gvcn_subjetcts)) {
                                $item->teacher_id = $teacher_id;
                            } else {
                                $teacher_subject_ids = Subject::find($subject_level->subject_id)->teachers->pluck('id')->toArray();
                                $item->teacher_id = $teacher_subject_ids[array_rand($teacher_subject_ids)];
                            }
                            $break = true;
                            break;
                        }
                    }
                    if ($break) {
                        break;
                    }
                }
            }
        }

        return $time_table_class;
    }

    private function saveDatabase($time_table)
    {
        TimeTable::truncate();
        foreach ($time_table as $klass_id => $time_table_class) {
            foreach ($time_table_class as $time_table_date) {
                foreach ($time_table_date as $item) {
                    if ($item != null) {
                        $item->save();
                    }
                }
            }
        }
    }

    private function danhGiaDoThichNghi(array $time_table)
    {
        $diemTru = 0;
        foreach ($time_table as $kass_id => $klass_time_table) {
            foreach ($klass_time_table as $date => $date_time_table) {
                $hocLienTiep = 1;
                $subject_id = 0;
                $i = 0;
                foreach ($date_time_table as $item) {
                    if ($item == null) {
                        continue;
                    }
                    if ($subject_id == $item->subject_id) {
                        $hocLienTiep++;
                        if ($hocLienTiep > 2) {
                            $diemTru++;
                        }
                    } else {
                        $hocLienTiep = 1;
                        $subject_id = $item->subject_id;
                    }

                }
            }
        }
        $teacher_id_map = [];
        foreach ($time_table as $kass_id => $klass_time_table) {
            $teacher_ids = [];
            foreach ($klass_time_table as $date => $date_time_table) {
                foreach ($date_time_table as $item) {
                    if ($item == null) {
                        $teacher_ids[] = -1;
                    } else {
                        $teacher_ids[] = $item->teacher_id;
                    }
                }
            }
            $teacher_id_map[] = $teacher_ids;
        }

        for ($i = 0; $i < count($teacher_id_map) - 1; $i++) {
            for ($j = $i + 1; $j < count($teacher_id_map); $j++) {
                $diemTru += $this->trungGio($teacher_id_map[$i], $teacher_id_map[$j]);
            }
        }
        return $diemTru;
    }

    private function soSanhGiaDoThichNghi($nst1, $nst2)
    {
        $diem_tru = $this->danhGiaDoThichNghi($nst1) - $this->danhGiaDoThichNghi($nst2);
        return $diem_tru;
    }

    private function trungGio(array $arr1, array $arr2)
    {
        $diemTru = 0;
        for ($i = 0; $i < count($arr1); $i++) {
            if ($arr1[$i] == $arr2[$i] && $arr1[$i] != -1) $diemTru++;
        }
        return $diemTru;
    }

    private function laiTao(array $selections)
    {
        //không triển khai vì ảnh hưởng đến ràng buộc
        return $selections;
    }

    private function dotBien(array $selections, $teachers)
    {
        for ($i = 0; $i < count($selections); $i++) {
            $selections[$i] = $this->khuHocLienTiepTrenQuanThe($selections[$i]);
            $selections[$i] = $this->khuTrungLichGiaoVien($selections[$i], $teachers);
        }
        return $selections;
    }

    private function khuHocLienTiepTrenQuanThe(array $selection)
    {
        foreach ($selection as $time_table_class) {
            $this->khuHocLienTiep($time_table_class);
        }
//        foreach ($selection as $time_table_class) {
//
//            $lap = false;
//            $oldi = 0;
//            $oldj = 2;
//            while ($oldi < 5 && $oldj < 10) {
//                for ($i = $oldi; $i < 5; $i++) {
//                    for ($j = $oldj; $j < 10; $j++) {
//                        if (
//                            $time_table_class[$i][$j - 2] != null
//                            && $time_table_class[$i][$j - 1] != null
//                            && $time_table_class[$i][$j] != null
//                            && $time_table_class[$i][$j - 2]->subject_id == $time_table_class[$i][$j - 1]->subject_id
//                            && $time_table_class[$i][$j - 1]->subject_id == $time_table_class[$i][$j]->subject_id
//                        ) {
//                            $oldi = $i;
//                            $oldj = $j;
//                            $lap = true;
//                            break;
//                        }
//                    }
//                    if ($lap) {
//                        break;
//                    }
//                }
//
//                if ($lap) {
//                    for ($newi = $oldi; $newi < 5; $newi++) {
//                        $break = false;
//                        for ($newj = $oldj; $newj < 10; $newj++) {
//                            if ($time_table_class[$newi][$newj] != null
//                                && $time_table_class[$newi][$newj]->subject_id != 7
//                                && $time_table_class[$newi][$newj]->subject_id != 17
//                                && $time_table_class[$newi][$newj]->subject_id != $time_table_class[$oldi][$oldj]->subject_id
//                                && ($newi != $oldi || $newj != $oldj)) {
//                                $temp = $time_table_class[$newi][$newj];
//                                $time_table_class[$newi][$newj]->subject_id = $time_table_class[$oldi][$oldj]->subject_id;
//                                $time_table_class[$newi][$newj]->teacher_id = $time_table_class[$oldi][$oldj]->teacher_id;
//                                $time_table_class[$oldi][$oldj]->subject_id = $temp->subject_id;
//                                $time_table_class[$oldi][$oldj]->teacher_id = $temp->teacher_id;
//                                $break = true;
//                                break;
//                            }
//                        }
//                        if ($break) {
//                            break;
//                        }
//                    }
//                }
//                if ($i == 5 && $j == 10) {
//                    break;
//                }
//            }
//        }
        return $selection;
    }

    private function khuHocLienTiep($time_table_class)
    {
        $start_position = ['date' => 0, 'hour' => '2'];
        while ($start_position['date'] < 5 && $start_position['hour'] < 10) {
            $invalid_position = $this->timViTriTrung($time_table_class, $start_position);
            if (empty($invalid_position)) break;
            $next_valid_position = $this->timViTriMoi($time_table_class, $invalid_position);
            if (empty($next_valid_position)) break;
            $this->doiThongTin($time_table_class, $invalid_position, $next_valid_position);
        }
    }

    /**
     * @param array $time_table_class
     * @param ar $start_position
     * @return array $position['i','j']
     */
    private function timViTriTrung(array $time_table_class, array $start_position): array
    {
        $position = [];
        for ($i = $start_position['date']; $i < 5; $i++) {
            for ($j = $start_position['hour']; $j < 10; $j++) {
                if ($j < 2) continue;
                if (
                    $time_table_class[$i][$j - 2] != null
                    && $time_table_class[$i][$j - 1] != null
                    && $time_table_class[$i][$j] != null
                    && $time_table_class[$i][$j - 2]->subject_id == $time_table_class[$i][$j - 1]->subject_id
                    && $time_table_class[$i][$j - 1]->subject_id == $time_table_class[$i][$j]->subject_id
                ) {
                    $position['date'] = $i;
                    $position['hour'] = $j;
                    return $position;
                }
            }
        }
        return $position;
    }

    private function timViTriMoi(array $time_table_class, array $invalid_position)
    {
        $next_valid_position = [];
        $old_date = $invalid_position ['date'];
        $old_hour = $invalid_position ['hour'];
        for ($i = $old_date; $i < 5; $i++) {
            for ($j = $old_hour; $j < 10; $j++) {
                if ($time_table_class[$i][$j] != null
                    && $time_table_class[$i][$j]->subject_id != 7
                    && $time_table_class[$i][$j]->subject_id != 17
                    && $time_table_class[$i][$j]->subject_id != $time_table_class[$old_date][$old_hour]->subject_id
                    && ($i != $old_date || $j != $old_hour)) {
                    $next_valid_position['date'] = $i;
                    $next_valid_position['hour'] = $j;
                    return $next_valid_position;
                }
            }
        }

        return $next_valid_position;
    }

    private function doiThongTin($time_table_class, $old_position, $new_position)
    {
        $temp_subject_id = $time_table_class[$new_position['date']][$new_position['hour']]->subject_id;
        $temp_teacher_id = $time_table_class[$new_position['date']][$new_position['hour']]->teacher_id;
        $time_table_class[$new_position['date']][$new_position['hour']]->subject_id = $time_table_class[$old_position['date']][$old_position['hour']]->subject_id;
        $time_table_class[$new_position['date']][$new_position['hour']]->teacher_id = $time_table_class[$old_position['date']][$old_position['hour']]->teacher_id;
        $time_table_class[$old_position['date']][$old_position['hour']]->subject_id = $temp_subject_id;
        $time_table_class[$old_position['date']][$old_position['hour']]->teacher_id = $temp_teacher_id;
    }

    private function khuTrungLichGiaoVien(array $selection, $techers)
    {
        for ($date = 0; $date < 5; $date++) {
            for ($unit = 0; $unit < 10; $unit++) {
                for ($i = 1; $i < 30; $i++) {
                    if ($selection[$i][$date][$unit] == null) continue;
                    for ($j = $i + 1; $j <= 30; $j++) {
                        if ($selection[$j][$date][$unit] == null) continue;
                        if ($selection[$j][$date][$unit]->teacher_id == $selection[$i][$date][$unit]->teacher_id) {
                            $temp = $selection[$j][$date][$unit];
                            do {
                                $new_date = rand(0, 4);
                                $new_unit = rand(0, 9);
                            } while ($selection[$j][$new_date][$new_unit] == null); 
                            $selection[$j][$date][$unit]->teacher_id = $selection[$j][$new_date][$new_unit]->teacher_id;
                            $selection[$j][$date][$unit]->subject_id = $selection[$j][$new_date][$new_unit]->subject_id;
                            $selection[$j][$new_date][$new_unit]->teacher_id = $temp->teacher_id;
                            $selection[$j][$new_date][$new_unit]->subject_id = $temp->subject_id;
                        }
                    }
                }
            }
        }
        return $selection;
//        for ($i=1; $i<=30; $i++){
//            for ()
//        }
    }

}

