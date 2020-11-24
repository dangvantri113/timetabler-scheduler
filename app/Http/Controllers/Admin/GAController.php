<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chromosome;
use App\Models\Gen;
use App\Models\Klass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Collection;

class GAController
{
    /** @var Chromosome[] */
    private $population;
    private $totalUnit = 0;
    private $emptySlot = 0;
    private $totalTimeSlot = 50;
    private $subjects;
    private $selection;
    /**
     * @var array
     */
    private $crossOver;

    public function doScheduling()
    {
        $classes = Klass::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $this->subjects = $subjects;
        foreach ($subjects as $subject) {
            $this->totalUnit += $subject->number_hours;
        }
        $this->emptySlot = $this->totalTimeSlot - $this->totalUnit;
        if ($this->emptySlot < 0) {
            abort(500);
        }
        $this->initPopulation($classes, $teachers, $subjects, $this->emptySlot, 100);

        $times = 0;

        do {
            $times++;
            $this->considerFitness();
            $new_population_selected = $this->selection();
            $this->crossOver();
            $this->makeNewPopulation();
            $this->makeMutant();
        } while ($times < 1);

        $data = $this->population[0]->gens;
        return view('admin.timetable2', ['data' => $data, 'classes' => $classes, 'title' => 'TKB']);
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
//        dd($this->selection[1]);
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
//        dd($this->population);
    }

}

