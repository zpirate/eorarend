<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\YearModel;
use App\Models\SubjectModel;
use App\Models\LessonsPerWeekModel;

class YearsController extends BaseController
{
    protected $model = null;
    var $itemsPerPage = 10;
    public function __construct()
    {
        $this->model = new YearModel();
    }

    public function show(): string
    {
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
            } elseif (array_key_exists('save', $this->request->getPost()) && $this->request->getPost('save') == 'lessons') {
                    $lessonsPerWeekModel = new \App\Models\LessonsPerWeekModel();
                    $yearId = $this->request->getPost('year_id');
                    $saved = $lessonsPerWeekModel->saveLessons($this->request->getPost());
                    if (!$saved) {
                        return view('admin/years/subjects.php', array(
                            'data' => $lessonsPerWeekModel->getLessonsWithSubject($yearId),
                            'year' => $this->model->find($yearId),
                        ));
                    } else {
                        $message = $this->addMessage('success', 'A mentés sikerült.');
                    }
            } else {
                $saved = $this->model->save($this->request->getPost());
                if (!$saved) {
                    return view('admin/years/update.php', array(
                        'message' => $this->addMessage('danger', 'Hiba történt a mentés során.'),
                        'data' => $this->request->getPost(),
                        'errors' => $this->model->errors(),
                    ));
                } else {
                    $message = $this->addMessage('success', 'A mentés sikerült.');
                }
            }
        }

        return view('admin/years/show.php', array(
            'message' => $message,
            'datas' => $this->model->orderBy('name')->paginate($this->itemsPerPage),
            'pager' => $this->model->pager
        ));
    }

    public function update($id): string
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/years/update.php', array(
                'data' => $this->model->find($id),
            ));
        }
    }

    public function add(): string
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/years/update.php', array(
                'data' => array(
                    'id' => '',
                    'name' => '',
                ),
            ));
        }
    }

    public function subjects($id): string
    {
        $lessonsPerWeekModel = new \App\Models\LessonsPerWeekModel();

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/years/subjects.php', array(
                'data' => $lessonsPerWeekModel->getLessonsWithSubject($id),
                'year' => $this->model->find($id),
            ));
        }
    }
}
