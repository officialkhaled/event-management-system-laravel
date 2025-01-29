<?php

namespace App\Http\Controllers;

use App\Models\Event;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $events = Event::query()
            ->with([
                'district',
                'division',
                'upazila',
                'union',
            ])
            ->latest()
            ->get();

        return view('admin.dashboard', [
            'events' => $events,
        ]);
    }

    public function attendeeDashboard()
    {
        return view('attendee.dashboard');
    }
}
