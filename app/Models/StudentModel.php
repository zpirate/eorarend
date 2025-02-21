<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'class_id', 'educational_id'];

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
        'name' => "required",
        'class_id' => "required",
        'educational_id' => "required"
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'A tanuló nevének megadása kötelező.',
        ],
        'class_id' => [
            'required' => 'A tanuló osztályának megadása kötelező.',
        ],
        'educational_id' => [
            'required' => 'A tanuló oktatási azonosítójának megadása kötelező.',
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

    public function getCodeTable() {
        return $this->builder()->select('id as key, name as value')->orderBy('name')->get()->getResultArray();
    }

    public function getStudentsFull()
    {
        $this->builder()->select('students.*, classes.name as class_name')
            ->join('classes', 'classes.id=students.class_id', 'left')
            ->orderBy('students.name');
        return $this;
    }

}
