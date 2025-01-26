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
        dd($request->all());
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'division' => 'required',
        ], [
            'title.required' => 'Title is required',
            'date.required' => 'Date is required',
            'division.required' => 'Division is required',
        ]);

        Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'division_id' => $request->division,
            'district_id' => $request->district,
            'upazila_id' => $request->upazila,
            'union_id' => $request->union,
            'description' => $request->description,
        ]);

        if ($request->image_path) {
            $imageName = "images/" . time() . '.' . $request->image_path->extension();
            $request->image_path->move(storage_path('app/public/images'), $imageName);
            currentUser()->image = $imageName;

            currentUser()->save();
        }

        return redirect()->route('admin.events.index')->with('success', 'Event Created Successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', [
            'event' => $event,
        ]);
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
