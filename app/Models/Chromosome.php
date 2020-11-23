<?php

namespace App\Models;

use app\Service\GAService;

class Chromosome
{
    /**
     * @var Gen[]
     */
    public $gens;
    private $subjects;
    private $classes;
    private $score;

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score): void
    {
        $this->score = $score;
    }



    /**
     * Chromosome constructor.
     * @param Gen[] $gens
     */
    public function __construct(array $gens)
    {
        $this->gens = $gens;

    }

    public function calculateFitness($subjects)
    {
        $teacher_score = $this->calculateTeacherScore();
        $subject_score = $this->calculateSubjectScore($subjects);
        $this->setScore($teacher_score + $subject_score);
        return $this->getScore();
    }


    public function calculateTeacherScore()
    {
        $teacher_conflict = 0;
        $number_class_learning = 0;
        $number_classes = count($this->gens[0]);
        for ($i = 0; $i < 50; $i++) {
            $teacher_ids = [];
            for ($j = 0; $j < $number_classes; $j++) {
                if ($this->gens[$i][$j] != null) {
                    $number_class_learning++;
                    $teacher_id = $this->gens[$i][$j]->getTeacher()->id;
                    $teacher_ids[$teacher_id] = $teacher_id;
                }
            }
            if ($number_class_learning !== count($teacher_ids)) {
                $teacher_conflict++;
            }
        }

        return $teacher_conflict;
    }

    public function calculateSubjectScore($subjects)
    {
        $subjects_learning = [];

        foreach ($subjects as $subject){
            $subjects_learning[$subject->id] = 0;
        }
        $number_classes = count($this->gens[0]);
        for ($i = 0; $i < 50; $i++) {
            $time_period = 0;
            for ($j = 0; $j < $number_classes; $j++) {
                if ($this->gens[$i][$j] != null) {
                    $subject_id = $this->gens[$i][$j]->getSubject()->id;
                    $subjects_learning[$subject_id] ++;
                }
            }
        }
        $score = 0;
        foreach ($subjects as $subject){
            $score += abs($subject->number_hours - $subjects_learning[$subject->id]);
        }
        return $score;
    }

}
