<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeacherModel;
use App\Models\UsersModel;

class TeachersController extends BaseController
{
    protected $model = null;
    var $itemsPerPage = 500;
    public function __construct()
    {
        $this->model = new TeacherModel();
    }

    public function show(): string
    {
        return view('admin/teachers/show.php', array(
            'teachers' => $this->model->getTeachersFull()->paginate($this->itemsPerPage),
            'pager' => $this->model->pager
        ));
    }

    public function update($id): string
    {
        $users = new UsersModel();
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/teachers/update.php', array(
                'teacher' => $this->model->find($id),
                'users' => $users->findAllWithEmpty()
            ));
        }

        //echo "<script>console.log('Debug Objects: " . print_r($this->request->getPost()) . "' );</script>";
        $saved = $this->model->save($this->request->getPost());

        if ($saved) {
            return view('admin/teachers/show.php', array(
                'message' => $this->addMessage('success', 'A mentés sikerült.'),
                'teachers' => $this->model->getTeachersFull()->paginate($this->itemsPerPage),
                'pager' => $this->model->pager
            ));
        } else {
            return view('admin/teachers/update.php', array(
                'message' => $this->addMessage('danger', 'Hiba történt a mentés során.'),
                'teacher' => $this->request->getPost(),
                'users' => $users->findAllWithEmpty(),
                'errors' => $this->model->errors(),
            ));
        }
    }

    public function add(): string
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            $users = new UsersModel();

            return view('admin/teachers/update.php', array(
                'teacher' => array(
                    'id' => '',
                    'name' => '',
                    'user_id' => ''
                ),
                'users' => $users->findAllWithEmpty()
            ));
        }

        $saved = $this->model->save($this->request->getPost());

        return view('admin/teachers/update.php', array(
            'message' => $this->addMessage(
                $saved ? 'success' : 'danger',
                $saved ? 'A mentés sikerült.a' : 'Hiba történt a mentés során.a'
            ),
            'errors' => $this->model->errors(),
            'teachers' => $this->model->getTeachersFull()->paginate($this->itemsPerPage)
        ));
    }

    public function delete($id): string
    {
        $users = new UsersModel();
        try {
            $deleted = $this->model->delete($id);
        } catch (\Exception $e) {
            echo "<script>console.log('Debug Objects: " . print_r($this->model->errors()) . "' );</script>";
            return view('admin/teachers/show.php', array(
                'message' => $this->addMessage('danger', 'Váratlan hiba törént a mentés során.'),
                'teachers' => $this->model->getTeachersFull()->paginate($this->itemsPerPage),
                'users' => $users->findAllWithEmpty(),
                'pager' => $this->model->pager
            ));
        }
        //$this->model->delete($id);

        return view('admin/teachers/show.php', array(
            'message' => $this->addMessage(
                $deleted ? 'success' : 'danger',
                $deleted ? 'A törlés sikerült.' : 'Hiba történt a törlés során.'
            ),
            'teachers' => $this->model->getTeachersFull()->paginate($this->itemsPerPage),
            'users' => $users->findAllWithEmpty(),
            'pager' => $this->model->pager
        ));
    }
}
