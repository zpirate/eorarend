<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeacherAvailabilityModel;
use App\Models\TimetableModel;
use App\Models\ClassModel;
use App\Models\ClassroomModel;
use App\Models\LessonsPerWeekModel;

class TimetableController extends BaseController
{
    protected $model = null;
    var $itemsPerPage = 10;
    public function __construct()
    {
        $this->model = new TimetableModel();
    }

    public function show($classId): string
    {
        helper('array');
        $model = new TimetableModel();
        $classModel = new ClassModel();
        $teacherAvailabilityModel = new TeacherAvailabilityModel();
        $classroomModel = new ClassroomModel();
        $lessonsPerWeekModel = new LessonsPerWeekModel();

        $data = array(
            'timetable' => array(),
            'active' => $classId
        );

        $data['classes'] = $classModel->getCodetable();
        if ($classId == 0) {
            if (auth()->getProvider()->isStudent()) {
                $classId = auth()->getProvider()->getClassId();
            } elseif (auth()->getProvider()->isAdmin()) {
                $classId = $data['classes'][0]['key'];
                $data['active'] = $classId;
            } 
        }

        if (auth()->getProvider()->isTeacher()) {
            $timetable = $model->getTimetableForTeacher(auth()->user()->id);
        } else {
            $timetable = $model->getTimetableForClass($classId);
        }

        for ($i = 0; $i < 5; $i++) {
            $data['timetable'][$i] = $this->getDataByDay($timetable, $i + 1);
        }
        $data['subjects'] = $lessonsPerWeekModel->getSubjectsWithTeacher($classId);
        $data['classrooms'] = $classroomModel->getCodeTable();
        $data['availables'] = $teacherAvailabilityModel->findAll();

        foreach ($data['subjects'] as $key => $subject) {
            $subjectId = $data['subjects'][$key]['subject_id'];
            $cnt = 0;
            foreach ($timetable as $tt) {
                if ($subjectId == $tt['subject_id']) {
                    $cnt++;
                }
            }
            $data['subjects'][$key]['act_number'] = $cnt;
        }

        return view('admin/timetable/show', $data);
    }

    function getDataByDay($data, $day): array
    {
        $dataDay = array();
        foreach ($data as $row) {
            if ($row['day'] == $day) {
                array_push($dataDay, $row);
            }
        }

        $result = array();
        for ($i = 0; $i < MAX_LESSONS_PER_DAY; $i++) {
            $found = false;
            foreach ($dataDay as $row) {
                if ($row['lesson_of_day'] == $i + 1) {
                    $found = $row;
                    break;
                }
            }
            if ($found) {
                array_push($result, array(
                    'subject_name' => $found['subject_name'],
                    'subject_id' => $found['subject_id'],
                    'teacher_name' => $found['teacher_name'],
                    'teacher_id' => $found['teacher_id'],
                    'classroom_name' => $found['classroom_name'],
                    'classroom_id' => $found['classroom_id'],
                ));
            } else {
                array_push($result, array('subject_name' => '',  'subject_id' => '', 'teacher_name' => '', 'teacher_id' => '', 'classroom_name' => '', 'classroom_id' => ''));
            }
        }

        return $result;
    }

    public function updateSubject() {
        $model = new TimetableModel();
        $classId = $this->request->getPost('class_id');
        $day = $this->request->getPost('day');
        $lessonOfDay = $this->request->getPost('hour');
        $subjectId = $this->request->getPost('subject_id');

        if ($subjectId == "-") {
            $model->deleteSubject($classId, $day, $lessonOfDay);
            return json_encode(array(
                'status' => 'success',
                'message' => 'Órarend sikeresen törölve!'
            ));
        }

        if ($model->updateSubject($classId, $day, $lessonOfDay, $subjectId)) {
            return json_encode(array(
                'status' => 'success',
                'message' => 'Órarend sikeresen frissítve!'
            ));
        } else {
            return json_encode(array(
                'status' => 'error',
                'message' => 'Órarend frissítése sikertelen!'
            ));
        }
    }

    public function updateClassroom() {
        $model = new TimetableModel();
        $classId = $this->request->getPost('class_id');
        $day = $this->request->getPost('day');
        $lessonOfDay = $this->request->getPost('hour');
        $classroomId = $this->request->getPost('classroom_id');

        if ($classroomId == "-") {
            $model->deleteClassroom($classId, $day, $lessonOfDay);
            return json_encode(array(
                'status' => 'success',
                'message' => 'Órarend sikeresen törölve!'
            ));
        }

        if ($model->updateClassroom($classId, $day, $lessonOfDay, $classroomId)) {
            return json_encode(array(
                'status' => 'success',
                'message' => 'Órarend sikeresen frissítve!'
            ));
        } else {
            return json_encode(array(
                'status' => 'error',
                'message' => 'Órarend frissítése sikertelen!'
            ));
        }
    }
}
