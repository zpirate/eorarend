<?php

namespace App\Controllers;

use App\Models\TeacherModel;

class TeachersController extends BaseController
{
    protected $model = null;

    public function __construct()
    {
        $this->model = new TeacherModel();
    }

    public function index(): string
    {
        return view(
            'teachers',
            array(
                'teachers' => $this->model->getTeachersData()
            )
        );
    }
}
