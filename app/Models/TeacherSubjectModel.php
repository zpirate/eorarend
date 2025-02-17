<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherSubjectModel extends Model
{
    protected $table            = 'teachers_subjects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['teacher_id','subject_id'];

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
        'teacher_id' => "required",
        'subject_id' => 'required',
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

    function saveSubjects($data)
    {
        $subjects = $this->getSubjects($data['teacher_id']);
        $selectedSubjects = array();
        foreach ($data as $key => $value) {
            if (strpos($key, 'cb_') !== false) {
                array_push($selectedSubjects, str_replace('cb_', '', $key));
            }
        }

        // delete
        foreach ($subjects as $subject) {
            if(!in_array($subject, $selectedSubjects))
            {
                $this->builder()->where('teacher_id', $data['teacher_id'])->where('subject_id', $subject)->delete();
            }
        }
        // insert
        foreach ($selectedSubjects as $subject) {
            if(!in_array($subject, $subjects))
            {
                $this->insert(array('teacher_id' => $data['teacher_id'], 'subject_id' => $subject));
            }
        }
        return true;
    }

    function getSubjects($teacher_id)
    {
        $teacherSubjects = $this->builder()->where('teachers_subjects.teacher_id', $teacher_id)->get()->getResultArray();
        $subjects = array();
        foreach ($teacherSubjects as $subject) {
            array_push($subjects, $subject['subject_id']);
        }
        return $subjects;
    }
}
