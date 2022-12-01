<?php

namespace App\Http\Controllers;

use App\Models\studs;
use domain\Facades\StudFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudController extends ParentController
{
    public function index()
    {
        return Inertia::render('Stud/index');
    }
    public function store(Request $request)
    {
        return StudFacade::store($request->all());
    }
    public function list()
    {
        $tasks = StudFacade::all();
        return response()->json($tasks);
    }
    public function get($task_id)
    {
        $task = StudFacade::get($task_id);
        return response()->json($task);
    }
    public function delete($task_id)
    {
        return StudFacade::delete($task_id);
    }
    public function status($task_id)
    {
        StudFacade::status($task_id);
        return redirect()->back();
    }
    public function edit(Request $request)
    {
        $response['task'] = StudFacade::get($request['task_id']);
        return view('pages.stud.edit')->with($response);
    }
    public function update(Request $request,$task_id)
    {
        StudFacade::update($request->all(), $task_id);
        return redirect()->back();
    }
}

