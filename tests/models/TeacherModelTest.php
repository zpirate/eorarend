<?php

namespace App\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class TeacherModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    function testInsertUpdateGetDelete() {
        $model = new \App\Models\TeacherModel();
        $newName = 'Teszt Teacher';
        $data = [
            'name' => $newName,
            'user_id' => 0
        ];

        // Insert new record
        $newId = $model->insert($data, true);
        $this->seeNumRecords(1, 'teachers', array('name' => $newName));

        // Update record
        $newName = 'Teszt Teacher2';
        $model->update($newId, ['name' => $newName]);
        $this->seeNumRecords(1, 'teachers', array('name' => $newName));

        // Check getTeachersData
        $data = $model->getTeachersData();
        $getId = 0;
        foreach ($data as $row) {
            if ($row['name'] == $newName) {
                $getId = $row['id'];
            }
        }
        $this->assertEquals($newId, $getId);

        // Check getTeachersData
        $m = $model->getTeachersFull();
        $getId = 0;
        foreach ($m->get()->getResultArray() as $row) {
            if ($row['name'] == $newName) {
                $getId = $row['id'];
            }
        }
        $this->assertEquals($newId, $getId);

        // Delete record
        $model->delete($newId);
        $this->seeNumRecords(0, 'teachers', array('name' => $newName));
    }

}