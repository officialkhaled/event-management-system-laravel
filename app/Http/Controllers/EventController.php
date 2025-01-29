<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Devfaysal\BangladeshGeocode\Models\Division;

class EventController extends Controller
{
    public function index()
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

        return view('admin.events.list', [
            'events' => $events,
        ]);
    }

    public function create()
    {
        $divisions = Division::all();

        return view('admin.events.create', [
            'divisions' => $divisions,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'division_id' => 'required',
        ], [
            'title.required' => 'Title is required',
            'date.required' => 'Date is required',
            'division_id.required' => 'Division is required',
        ]);

        $event = Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'union_id' => $request->union_id,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = "images/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/images'), $imageName);

            $event->update([
                'image_path' => $imageName,
            ]);
        }

        return redirect()->route('admin.events.index')->with('success', 'Event Created Successfully!');
    }

    public function edit(Event $event)
    {
        $divisions = Division::all();

        return view('admin.events.edit', [
            'event' => $event,
            'divisions' => $divisions,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $event->update($request->all());

        if ($request->hasFile('image_path')) {
            if ($event->image_path && Storage::exists('public/' . $event->image_path)) {
                Storage::delete('public/' . $event->image_path);
            }

            $image = $request->file('image_path');
            $imageName = "images/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/images'), $imageName);

            $event->update([
                'image_path' => $imageName,
            ]);
        }

        $event->save();

        return redirect()->route('admin.events.index')->with('success', 'Event Updated Successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event Deleted Successfully.');
    }
}
