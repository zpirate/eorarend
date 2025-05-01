<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,
            'full_name',
            'educational_id'
        ];
    }

    function getCodetable() {
        return $this->builder()->select("id as key, username as value")->orderBy('username')->get()->getResultArray();
    }

    function isAdmin() {
        return in_array('admin', auth()->user()->getGroups());
    }

    function isStudent() {
        return in_array('student', auth()->user()->getGroups());
    }

    function isTeacher() {
        return in_array('teacher', auth()->user()->getGroups());
    }

    function getClassId() {
        $cid = 0;
        if ($this->isStudent()) {
            $sModel = new \App\Models\StudentModel();
            $row = $sModel->builder()->where('educational_id', auth()->user()->educational_id)->get()->getResultArray();
            if (count($row) > 0) {
                $cid = $row[0]['class_id'];
            }
        }
        return $cid;
    }

    function getClassName() {
        $cName = "";
        $cid = $this->getClassId();
        if ($cid != 0) {
            $cModel = new \App\Models\ClassModel();
            $row = $cModel->find($cid);
            $cName = $row['name'];
        }
        return $cName;
    }
}
 