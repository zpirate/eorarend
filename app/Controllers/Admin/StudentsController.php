<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class StudentsController extends BaseController
{
    protected $model = null;
    var $itemsPerPage = 10;
    public function __construct()
    {
        $this->model = new StudentModel();
    }

    public function show(): string
    {
        $classModel = new \App\Models\ClassModel();

        $message = array('text' => '', 'type' => '');

        if (strtolower($this->request->getMethod()) == 'post') {
            if ($this->request->getPost('method') == 'delete') {
                $deleted = false;
                try {
                    $deleted = $this->model->delete($this->request->getPost('id'));
                    if (!$deleted) {
                        $message = $this->addMessage('danger', 'Hiba történt a törlés során.');
                    } else {
                        $message = $this->addMessage('success', 'A törlés sikerült.');
                    }
                } catch (\Exception $e) {
                    $message = $this->addMessage('danger', 'Az elem törlése nem lehetséges, mert más adatok hivatkoznak rá.');                    
                }        
            } else {
                $saved = $this->model->save($this->request->getPost());
                if (!$saved) {
                    return view('admin/students/update.php', array(
                        'message' => $this->addMessage('danger', 'Hiba történt a mentés során.'),
                        'data' => $this->request->getPost(),
                        'errors' => $this->model->errors(),
                        'classes' => $classModel->getCodeTable(),
                    ));
                } else {
                    $message = $this->addMessage('success', 'A mentés sikerült.');
                }
            }
        }

        return view('admin/students/show.php', array(
            'message' => $message,
            'datas' => $this->model->getStudentsFull()->paginate($this->itemsPerPage),
            'classes' => $classModel->getCodeTable(),
            'pager' => $this->model->pager
        ));
    }

    public function update($id)
    {
        $classModel = new \App\Models\ClassModel();

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/students/update.php', array(
                'data' => $this->model->find($id),
                'classes' => $classModel->getCodeTable(),
            ));
        }
    }

    public function add()
    {
        $classModel = new \App\Models\ClassModel();

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/students/update.php', array(
                'data' => array(
                    'id' => '',
                    'name' => '',
                    'class_id' => '',
                    'educational_id' => '',
                ),
                'classes' => $classModel->getCodeTable(),
            ));
        }
    }
}
