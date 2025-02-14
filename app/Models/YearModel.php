<?php

namespace App\Models;

use CodeIgniter\Model;

class YearModel extends Model
{
    protected $table            = 'years';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name'];

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
        'name' => "required|is_unique[years.name,id,{id}]"
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Az évfolyam nevének megadása kötelező.',
            'is_unique' => 'Az évfolyam neve már szerepel az adatbázisban.'
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

    public function findAllWithEmpty() {
        $ret = $this->builder()->select('id, name')->orderBy('name')->get()->getResultArray();
        $result = array(''=>'');
        foreach ($ret as $value) {
            $result[$value['id']] = $value['name'];
        }
        return $result;
    }

}
