<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table            = 'classes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['year_id','name', 'class_teacher_id'];

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
        'name' => "required|is_unique[classes.name,id,{id}]",
        'year_id' => "required",
        'class_teacher_id' => "required"
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Az osztály nevének megadása kötelező.',
            'is_unique' => 'A osztály neve már szerepel az adatbázisban.'
        ],
        'year_id' => [
            'required' => 'Az évfolyam kiválasztása kötelező.',
        ],
        'class_teacher_id' => [
            'required' => 'Az osztályfőnök kiválasztása kötelező.',
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

    public function getDataFull() {
        $this->builder()->select('classes.*, teachers.name as teacher_name, years.name as year_name')
                ->join('teachers', 'teachers.id=classes.class_teacher_id')
                ->join('years', 'years.id=classes.year_id')
                ->orderBy('classes.name');
        return $this;
    }

    function getCodetable() {
        return $this->builder()->select("id as key, name as value")->orderBy('name')->get()->getResultArray();
    }

}
