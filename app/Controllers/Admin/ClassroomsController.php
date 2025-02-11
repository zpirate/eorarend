<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClassroomModel;

class ClassroomsController extends BaseController
{
    protected $model = null;
    var $itemsPerPage = 10;
    public function __construct()
    {
        $this->model = new ClassroomModel();
    }

    public function show(): string
    {
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
                    return view('admin/classrooms/update.php', array(
                        'message' => $this->addMessage('danger', 'Hiba történt a mentés során.'),
                        'data' => $this->request->getPost(),
                        'errors' => $this->model->errors(),
                    ));
                } else {
                    $message = $this->addMessage('success', 'A mentés sikerült.');
                }
            }
        }

        return view('admin/classrooms/show.php', array(
            'message' => $message,
            'datas' => $this->model->orderBy('name')->paginate($this->itemsPerPage),
            'pager' => $this->model->pager
        ));
    }

    public function update($id): string
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/classrooms/update.php', array(
                'data' => $this->model->find($id),
            ));
        }
    }

    public function add(): string
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/classrooms/update.php', array(
                'data' => array(
                    'id' => '',
                    'name' => '',
                ),
            ));
        }
    }
}
