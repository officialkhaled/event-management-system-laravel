<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function attendeeDashboard()
    {
        return view('attendee.dashboard');
    }
}
