<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeacherModel;
use App\Models\ClassModel;
use App\Models\YearModel;

class ClassesController extends BaseController
{
    protected $model = null;
    var $itemsPerPage = 10;
    public function __construct()
    {
        $this->model = new ClassModel();
    }

    public function show(): string
    {
        $years = new YearModel();
        $teachers = new TeacherModel();
        $message = array('text' => '', 'type' => '');

        if (strtolower($this->request->getMethod()) == 'post') {
            if ($this->request->getPost('method') == 'delete') {
                try {
                    $deleted = $this->model->delete($this->request->getPost('id'));
                } catch (\Exception $e) {
                    $message = $this->addMessage('danger', 'Váratlan hiba törént a mentés során.');
                }

                if (!$deleted) {
                    $message = $this->addMessage('danger', 'Hiba történt a törlés során.');
                } else {
                    $message = $this->addMessage('success', 'A törlés sikerült.');
                }
            } else {
                $saved = $this->model->save($this->request->getPost());
                if (!$saved) {
                    return view('admin/classes/update.php', array(
                        'message' => $this->addMessage('danger', 'Hiba történt a mentés során.'),
                        'data' => $this->request->getPost(),
                        'years' => $years->findAllWithEmpty(),
                        'teachers' => $teachers->findAllWithEmpty(),
                        'errors' => $this->model->errors(),
                    ));
                } else {
                    $message = $this->addMessage('success', 'A mentés sikerült.');
                }
            }
        }

        return view('admin/classes/show.php', array(
            'message' => $message,
            'datas' => $this->model->getDataFull()->paginate($this->itemsPerPage),
            'pager' => $this->model->pager
        ));
    }

    public function update($id): string
    {
        $years = new YearModel();
        $teachers = new TeacherModel();
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/classes/update.php', array(
                'data' => $this->model->find($id),
                'years' => $years->findAllWithEmpty(),
                'teachers' => $teachers->findAllWithEmpty(),
            ));
        }
    }

    public function add(): string
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            $years = new YearModel();
            $teachers = new TeacherModel();

            return view('admin/classes/update.php', array(
                'data' => array(
                    'id' => '',
                    'name' => '',
                    'year_id' => '',
                    'class_teacher_id' => ''
                ),
                'years' => $years->findAllWithEmpty(),
                'teachers' => $teachers->findAllWithEmpty(),
            ));
        }
    }
}
