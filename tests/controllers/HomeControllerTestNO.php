<?php

namespace App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class HomeControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    public function testShowCategories()
    {
        $result = $this->withUri('http://localhost:7070/eorarend/public')
            ->controller(HomeController::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
    }
}