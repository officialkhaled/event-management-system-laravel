<?php

namespace App\Http\Controllers;

class AttendeeController extends Controller
{
    public function index()
    {
        return view('admin.attendees.list');
    }
}
