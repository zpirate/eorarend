<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SubjectModel;
use App\Models\TeacherModel;
use App\Models\UserModel;
use Illuminate\Support\Arr;

class TeachersController extends BaseController
{
    protected $model = null;
    var $itemsPerPage = 10;
    public function __construct()
    {
        $this->model = new TeacherModel();
    }

    public function show(): string
    {
        $users = new UserModel();
        $message = array('text' => '', 'type' => '');

        //$this->model->getTeachersFullSubject();

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
            } elseif (array_key_exists('save', $this->request->getPost()) && $this->request->getPost('save') == 'subjects') {
                $subjectModel = new \App\Models\TeacherSubjectModel();
                $saved = $subjectModel->saveSubjects($this->request->getPost());
                if (!$saved) {
                    $subjectModel = new SubjectModel();
                    $teacherSubjectModel = new \App\Models\TeacherSubjectModel();

                    return view('admin/teachers/subjects.php', array(
                        'data' => $teacherSubjectModel->getSubjects($this->request->getPost()['teacher_id']),
                        'teacher' => $this->model->find($this->request->getPost()['teacher_id']),
                        'subjects' => $subjectModel->getCodeTable()
                    ));
                } else {
                    $message = $this->addMessage('success', 'A mentés sikerült.');
                }
            } else {
                $saved = $this->model->save($this->request->getPost());
                if (!$saved) {
                    return view('admin/teachers/update.php', array(
                        'message' => $this->addMessage('danger', 'Hiba történt a mentés során.'),
                        'data' => $this->request->getPost(),
                        'users' => $users->getCodeTable(),
                        'errors' => $this->model->errors(),
                    ));
                } else {
                    $message = $this->addMessage('success', 'A mentés sikerült.');
                }
            }
        }

        return view('admin/teachers/show.php', array(
            'message' => $message,
            'datas' => $this->model->getTeachersFullSubject()->paginate($this->itemsPerPage),
            'pager' => $this->model->pager
        ));
    }

    public function update($id): string
    {
        $users = new UserModel();
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/teachers/update.php', array(
                'data' => $this->model->find($id),
                'users' => $users->getCodeTable()
            ));
        }
    }

    public function add(): string
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            $users = new UserModel();

            return view('admin/teachers/update.php', array(
                'data' => array(
                    'id' => '',
                    'name' => '',
                    'user_id' => ''
                ),
                'users' => $users->getCodeTable()
            ));
        }
    }

    public function subjects($id): string
    {
        $subjectModel = new SubjectModel();
        $teacherSubjectModel = new \App\Models\TeacherSubjectModel();

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/teachers/subjects.php', array(
                'data' => $teacherSubjectModel->getSubjects($id),
                'teacher' => $this->model->find($id),
                'subjects' => $subjectModel->getCodeTable()
            ));
        }
    }
}
