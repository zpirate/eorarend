<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClassroomModel;
use App\Models\UsersModel;

class ClassroomsController extends BaseController
{
    protected $model = null;
    var $itemsPerPage = 500;
    public function __construct()
    {
        $this->model = new ClassroomModel();
    }

    public function show(): string
    {
        return view('admin/classrooms/show.php', array(
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

        $saved = $this->model->save($this->request->getPost());

        if ($saved) {
            return view('admin/classrooms/show.php', array(
                'message' => $this->addMessage('success', 'A mentés sikerült.'),
                'datas' => $this->model->orderBy('name')->paginate($this->itemsPerPage),
                'pager' => $this->model->pager
            ));
        } else {
            return view('admin/classrooms/update.php', array(
                'message' => $this->addMessage('danger', 'Hiba történt a mentés során.'),
                'data' => $this->request->getPost(),
                'errors' => $this->model->errors(),
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
                    'user_id' => ''
                )
            ));
        }

        $saved = $this->model->save($this->request->getPost());

        return view('admin/classrooms/update.php', array(
            'message' => $this->addMessage(
                $saved ? 'success' : 'danger',
                $saved ? 'A mentés sikerült.' : 'Hiba történt a mentés során.'
            ),
            'errors' => $this->model->errors(),
            'datas' => $this->model->orderBy('name')->paginate($this->itemsPerPage)
        ));
    }

    public function delete($id): string
    {
        try {
            $deleted = $this->model->delete($id);
        } catch (\Exception $e) {
            echo "<script>console.log('Debug Objects: " . print_r($this->model->errors()) . "' );</script>";
            return view('admin/classrooms/show.php', array(
                'message' => $this->addMessage('danger', 'Váratlan hiba törént a mentés során.'),
                'datas' => $this->model->orderBy('name')->paginate($this->itemsPerPage),
                'pager' => $this->model->pager
            ));
        }

        return view('admin/classrooms/show.php', array(
            'message' => $this->addMessage(
                $deleted ? 'success' : 'danger',
                $deleted ? 'A törlés sikerült.' : 'Hiba történt a törlés során.'
            ),
            'datas' => $this->model->orderBy('name')->paginate($this->itemsPerPage),
            'pager' => $this->model->pager
        ));
    }
}
