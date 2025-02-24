<?php

namespace App\Models;

use CodeIgniter\Model;

class TimetableModel extends Model
{
    protected $table            = 'timetables';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['class_id', 'day', 'lesson_of_day', 'subject_id', 'teacher_id', 'classroom_id'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id' => 'permit_empty|is_natural_no_zero',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTimetableForClass($class_id)
    {
        return $this->builder()->select('timetables.*, 
                                classes.name as class_name, 
                                subjects.name as subject_name, 
                                teachers.name as teacher_name, 
                                classrooms.name as classroom_name')
            ->join('classes', 'classes.id=timetables.class_id', 'left')
            ->join('subjects', 'subjects.id=timetables.subject_id', 'left')
            ->join('teachers', 'teachers.id=timetables.teacher_id', 'left')
            ->join('classrooms', 'classrooms.id=timetables.classroom_id', 'left')
            ->where('timetables.class_id', $class_id)->get()->getResultArray();
        //return $this;
    }

    public function getTimetableForTeacher($teacher_id)
    {
        return $this->builder()->select('timetables.*, 
                                classes.name as teacher_name, 
                                subjects.name as subject_name, 
                                classrooms.name as classroom_name')
            ->join('classes', 'classes.id=timetables.class_id', 'left')
            ->join('subjects', 'subjects.id=timetables.subject_id', 'left')
            ->join('teachers', 'teachers.id=timetables.teacher_id', 'left')
            ->join('classrooms', 'classrooms.id=timetables.classroom_id', 'left')
            ->where('timetables.teacher_id', $teacher_id)->get()->getResultArray();
        //return $this;
    }

}
