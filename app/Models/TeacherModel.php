<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table            = 'teachers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'user_id'];

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
        'name' => "required|is_unique[teachers.name,id,{id}]",
        'user_id' => 'is_unique[teachers.user_id,teachers.user_id,0]',
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'A tanár nevének megadása kötelező.',
            'is_unique' => 'A tanár neve már szerepel az adatbázisban.'
        ],
        'user_id' => [
            'is_unique' => 'A megadott felhasználó már egy másik tanárhoz van hozzárendelve.'
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

    public function getTeachersFull()
    {
        $this->builder()->select('teachers.*, users.username, (select count(*) from classes where classes.class_teacher_id=teachers.id) as classcount')
            ->join('users', 'users.id=teachers.user_id', 'left')
            ->orderBy('teachers.name');
        return $this;
    }

    public function getTeachersData()
    {
        return $this->getTeachersFull()->get()->getResultArray();
    }

    public function getTeachersFullSubject()
    {
        $this->builder()->select('teachers.id, teachers.name, teachers.user_id, users.username, 
                                group_concat(subjects.name order by subjects.name separator ", ") as subjects, 
                                (select count(*) from classes where classes.class_teacher_id=teachers.id) as classcount')
            ->join('users', 'users.id=teachers.user_id', 'left')
            ->join('teachers_subjects', 'teachers_subjects.teacher_id=teachers.id', 'left')
            ->join('subjects', 'subjects.id=teachers_subjects.subject_id', 'left')
            ->groupBy('teachers.id, teachers.name, teachers.user_id, users.username, classcount')
            ->orderBy('teachers.name');
        return $this;
    }

    function getCodetable()
    {
        return $this->builder()->select("id as key, name as value")->orderBy('name')->get()->getResultArray();
    }

    function getTeacher($userId) {
        $teacher = $this->builder()->where("user_id", $userId)->get()->getResultArray();
        if (count($teacher) > 0) {
            return $teacher[0];
        } else {
            return array();
        }
    }
}
