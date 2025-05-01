<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ClassTeacherModel extends Model
{
    protected $table            = 'classes_teachers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['class_id', 'subject_id', 'teacher_id'];

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
        'subject_id' => "required",
        'teacher_id' => "required",
    ];
    protected $validationMessages   = [
        'teacher_id' => [
            'required' => 'A tanár kiválasztása kötelező.',
        ]
    ];
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

    function saveSubjects($data)
    {
        $classId = $data['class_id'];
        foreach ($data as $key => $value) {
            if (strpos($key, 'sel_teacher_') !== false) {
                $subjectId = str_replace('sel_teacher_', '', $key);
                $teacherId = $value;
                //echo "{$classId}-{$subjectId}-{$teacherId}";
                if (empty($teacherId)) {
                    // torles
                    $this->where('class_id', $classId)->where('subject_id', $subjectId)->delete();
                } else {
                    // insert/update
                    try {
                        $this->insert(array('class_id' => $classId, 'subject_id' => $subjectId, 'teacher_id' => $teacherId));
                    } catch (Exception $e) {
                        $this->where('class_id', $classId)->where('subject_id', $subjectId)->set('teacher_id', $teacherId)->update();
                    }
                }
            }
        }
        return true;
    }

    public function getByClass($id) {
        return $this->where('class_id', $id)->get()->getResultArray();
    }

    public function getSubjects($id)
    {
        $this->builder()->select('classes_teachers.*, subjects.name as subject_name, teachers.name as teacher_name')
            ->join('classes', 'classes.id=classes_teachers.class_id')
            ->join('lessons_per_week', 'lessons_per_week.year_id=classes.year_id')
            ->join('subjects', 'subjects.id=lessons_per_week.subject_id')
            ->join('teachers', 'teachers.id=classes_teachers.teacher_id')
            ->where('id', $id)
            ->orderBy('classes.name');
        return $this;
    }
}
