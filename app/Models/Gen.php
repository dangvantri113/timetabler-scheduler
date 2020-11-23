<?php

namespace App\Models;

class Gen
{
    private $timeSlot;

    private $class;

    private $teacher;

    private $subject;

    /**
     * Gen constructor.
     * @param int $time_slot
     * @param Klass $class
     * @param Teacher|null $teacher
     * @param Subject|null $subject
     */
    public function __construct(int $time_slot, Klass $class, ?Teacher $teacher, ?Subject $subject)
    {
        $this->timeSlot = $time_slot;
        $this->class = $class;
        $this->teacher = $teacher;
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getTimeSlot()
    {
        return $this->timeSlot;
    }

    /**
     * @param mixed $timeSlot
     */
    public function setTimeSlot($timeSlot): void
    {
        $this->timeSlot = $timeSlot;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class): void
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * @param mixed $teacher
     */
    public function setTeacher($teacher): void
    {
        $this->teacher = $teacher;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    public function caculateFitness()
    {

    }
}
