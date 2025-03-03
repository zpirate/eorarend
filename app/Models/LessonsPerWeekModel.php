<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonsPerWeekModel extends Model
{
    protected $table            = 'lessons_per_week';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['year_id', 'subject_id', 'lesson_number'];

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
        'year_id' => "required",
        'subject_id' => "required",
        'lesson_number' => "required",
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

    public function getLessonsWithSubject($yearId)
    {
        $sql = "SELECT l.id, {$yearId} as year_id, s.id as subject_id, IFNULL(l.lesson_number, 0) as lesson_number, s.name as name
                FROM subjects s
                LEFT JOIN lessons_per_week l ON l.subject_id = s.id
                WHERE l.year_id = ? OR l.year_id IS NULL
                ORDER BY s.name";
        return $this->db->query($sql, [$yearId])->getResultArray();
    }

    public function saveLessons($data){
        foreach ($data as $key => $value) {
            if (strpos($key, 'subject_') !== false) {
                $subjectId = str_replace('subject_', '', $key);
                $lessonNumber = $value;

                if ($lessonNumber == 0) {
                    $this->where('year_id', $data['year_id'])->where('subject_id', $subjectId)->delete();
                } else {
                    $ret = $this->where('year_id', $data['year_id'])->where('subject_id', $subjectId)->get()->getResultArray();
                    if (count($ret) > 0) {
                        $this->where('year_id', $data['year_id'])->where('subject_id', $subjectId)->set(['lesson_number' => $lessonNumber])->update();
                    } else {
                        $this->save([
                            'year_id' => $data['year_id'],
                            'subject_id' => $subjectId,
                            'lesson_number' => $lessonNumber
                        ]);
                    }
                }
            }
        }
        return true;
    }

}
