<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

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
                                subjects.id as subject_id,
                                teachers.id as teacher_id,
                                teachers.name as teacher_name,
                                classrooms.id as classroom_id,
                                classrooms.name as classroom_name')
            ->join('classes', 'classes.id=timetables.class_id', 'left')
            ->join('subjects', 'subjects.id=timetables.subject_id', 'left')
            ->join('teachers', 'teachers.id=timetables.teacher_id', 'left')
            ->join('classrooms', 'classrooms.id=timetables.classroom_id', 'left')
            ->where('timetables.class_id', $class_id)->get()->getResultArray();
    }

    public function getTimetableForTeacher($userId)
    {
        return $this->builder()->select('timetables.*, 
                                classes.name as teacher_name, 
                                subjects.name as subject_name, 
                                classrooms.name as classroom_name')
            ->join('classes', 'classes.id=timetables.class_id', 'left')
            ->join('subjects', 'subjects.id=timetables.subject_id', 'left')
            ->join('teachers', 'teachers.id=timetables.teacher_id', 'left')
            ->join('classrooms', 'classrooms.id=timetables.classroom_id', 'left')
            ->where('teachers.user_id', $userId)->get()->getResultArray();
    }

    public function updateSubject($classId, $day, $hour, $subjectId)
    {
        // error_log("updateSubject: classId: $classId, day: $day, hour: $hour, subjectId: $subjectId");
        try {
            $existing = $this->where('class_id', $classId)
                ->where('day', $day)
                ->where('lesson_of_day', $hour)
                ->first();
            if ($existing) {
                $data = [
                    'subject_id' => $subjectId
                ];
                return $this->update($existing['id'], $data);
            } else {
                return $this->insert([
                    'class_id' => $classId,
                    'day' => $day,
                    'lesson_of_day' => $hour,
                    'subject_id' => $subjectId
                ]);
            }
        } catch (Exception $e) {
            error_log($e);
        }
    }

    public function updateClassroom($classId, $day, $hour, $classroomId)
    {
        // error_log("updateClassroom: classId: $classId, day: $day, hour: $hour, classroomId: $classroomId");
        try {
            $existing = $this->where('class_id', $classId)
                ->where('day', $day)
                ->where('lesson_of_day', $hour)
                ->first();
            if ($existing) {
                $data = [
                    'classroom_id' => $classroomId
                ];
                return $this->update($existing['id'], $data);
            } else {
                return $this->insert([
                    'class_id' => $classId,
                    'day' => $day,
                    'lesson_of_day' => $hour,
                    'classroom_id' => $classroomId
                ]);
            }
        } catch (Exception $e) {
            error_log($e);
        }
    }

    public function deleteSubject($classId, $day, $hour)
    {
        return $this->where('class_id', $classId)
            ->where('day', $day)
            ->where('lesson_of_day', $hour)
            ->delete();
    }

    public function deleteClassroom($classId, $day, $hour)
    {
        $data = [
            'classroom_id' => null
        ];
        return $this->set($data)
            ->where('class_id', $classId)
            ->where('day', $day)
            ->where('lesson_of_day', $hour);
    }
}
