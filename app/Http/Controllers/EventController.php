<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Devfaysal\BangladeshGeocode\Models\Union;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::query()->with([
            'district',
            'division',
            'upazila',
            'union',
        ])->get();

        return view('admin.events.list', [
            'events' => $events,
        ]);
    }

    public function create()
    {
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $unions = Union::all();

        return view('admin.events.create', [
            'divisions' => $divisions,
            'districts' => $districts,
            'upazilas' => $upazilas,
            'unions' => $unions,
        ]);
    }

    public function store(Request $request)
    {
        return view('admin.events.create');
    }

    public function edit()
    {
        return view('admin.events.edit');
    }

    public function update(Request $request)
    {
        return view('admin.events.create');
    }

    public function destroy(Request $request)
    {
        return view('admin.events.list');
    }
}
