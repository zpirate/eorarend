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
                    $saved = $lessonsPerWeekModel->saveSubjects($this->request->getPost());
                    if (!$saved) {
                        $lessonsPerWeekModel = new SubjectModel();
                        $teacherSubjectModel = new \App\Models\LessonsPerWeekModel();
    
                        return view('admin/teachers/subjects.php', array(
                            'data' => $teacherSubjectModel->getSubjects($this->request->getPost()['teacher_id']),
                            'teacher' => $this->model->find($this->request->getPost()['teacher_id']),
                            'subjects' => $lessonsPerWeekModel->getCodeTable()
                        ));
                    } else {
                        $message = $this->addMessage('success', 'A mentés sikerült.');
                    }
                } elseif (array_key_exists('save', $this->request->getPost()) && $this->request->getPost('save') == 'availability') {
                    $teacherAvailabilityModel = new \App\Models\TeacherAvailabilityModel();
                    $availability = $this->request->getPost('availability');
                    $teacher_id = $this->request->getPost('teacher_id');
                    $aArr = explode(';', $availability);
                    $teacherAvailabilityModel->emptyTeacherAvailability($teacher_id);
                    $saved = true;
                    foreach ($aArr as $aRec) {
                        if (empty($aRec)) {
                            continue;
                        }
                        $aItem = explode(',', $aRec);
                        $data = array(
                            'teacher_id' => $teacher_id,
                            'day' => $aItem[0],
                            'hour' => $aItem[1]
                        );
                        $saved = $saved && $teacherAvailabilityModel->save($data);
                    }
                    if (!$saved) {
                        $teacherAvailabilityModel = new \App\Models\TeacherAvailabilityModel();
    
                        $tAvail = $teacherAvailabilityModel->getTeacherAvailability($teacher_id);
                        $availibility = array();
                        if ($tAvail != null) {
                            foreach ($tAvail as $ta) {
                                $availibility[$ta['day']][$ta['hour']] = 1;
                            }
                        }
    
                        if (strtolower($this->request->getMethod()) !== 'post') {
                            return view('admin/teachers/availability.php', array(
                                'data' => $availibility,
                                'teacher' => $this->model->find($teacher_id),
                            ));
                        }
                    } else {
                        $message = $this->addMessage('success', 'A mentés sikerült.');
                    }

















            } else {
                if ($this->request->getPost('method') == 'delete'){
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
        $subjectModel = new SubjectModel();
        $lessonsPerWeekModel = new \App\Models\LessonsPerWeekModel();

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('admin/years/subjects.php', array(
                'data' => $lessonsPerWeekModel->find($id),
                'year' => $this->model->find($id),
                'subjects' => $subjectModel->getCodeTable()
            ));
        }
    }
}
