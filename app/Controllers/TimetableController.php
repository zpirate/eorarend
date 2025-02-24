<?php

namespace App\Controllers;

use App\Models\TimetableModel;
use App\Models\ClassModel;

class TimetableController extends BaseController
{
    public function index($classId): string
    {
        helper('array');
        $model = new TimetableModel();
        $classModel = new ClassModel();
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

        return view('timetable', $data);
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
                    'teacher_name' => $found['teacher_name'],
                    'classroom_name' => $found['classroom_name']
                ));
            } else {
                array_push($result, array('subject_name' => '', 'teacher_name' => '', 'classroom_name' => ''));
            }
        }

        return $result;
    }
}
