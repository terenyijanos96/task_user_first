<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //index fg
    public function index(){
        $tasks = response()->json(Task::all());
        return $tasks;
    }

    public function show($id){
        $task = response()->json(Task::find($id));
        return $task;
    }

    public function store(Request $request){
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->end_date = $request->end_date;
        $task->user_id = $request->user_id;
        $task->status = $request->status;
        $task->save();
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->end_date = $request->end_date;
        $task->user_id = $request->user_id;
        $task->status = $request->status;
        $task->save();
    }

}
