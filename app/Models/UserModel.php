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
        ];
    }

    function getCodetable() {
        return $this->builder()->select("id as key, username as value")->orderBy('username')->get()->getResultArray();
    }

    // public function findAllWithEmpty() {
    //     $ret = $this->builder()->select('id, username')->orderBy('username')->get()->getResultArray();
    //     $result = array(''=>'');
    //     foreach ($ret as $value) {
    //         $result[$value['id']] = $value['username'];
    //     }
    //     return $result;
    // }
}
