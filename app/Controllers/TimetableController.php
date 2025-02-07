<?php

namespace App\Controllers;

class TimetableController extends BaseController
{
    public function index(): string
    {
        return view('timetable');
    }
}
