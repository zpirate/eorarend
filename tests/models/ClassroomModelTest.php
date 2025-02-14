<?php

namespace App\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class ClassroomModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    var $model;
    var $newData = "x999";

    function setUp(): void
    {
        parent::setUp();
        $this->model = new \App\Models\ClassroomModel();
        $rs = $this->model->like('name', "{$this->newData}%")->find();
        foreach ($rs as $row) {
            $this->model->delete($row['id']);
        }
    }

    function testInsertUpdateDelete() {
        $data = [
            'name' => $this->newData
        ];

        // Insert new record
        $newId = $this->model->insert($data, true);
        $this->seeNumRecords(1, $this->model->builder->getTable(), array('name' => $this->newData));

        // Update record
        $this->newData .= '2';
        $this->model->update($newId, ['name' => $this->newData]);
        $this->seeNumRecords(1, $this->model->builder->getTable(), array('name' => $this->newData));

        // Delete record
        $this->model->delete($newId);
        $this->seeNumRecords(0, $this->model->builder->getTable(), array('name' => $this->newData));
    }

}