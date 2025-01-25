<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.events.list');
    }

    public function create()
    {
        return view('admin.events.create');
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
