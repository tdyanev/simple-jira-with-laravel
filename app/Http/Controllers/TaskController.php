<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $tasks = Task::prioritize()->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('tasks.create', [
            'users' => User::all(),
            'tasks' => Task::all(),
        ]);
    }

    public function search(Request $request) {
        $string = $request->query('string');

        return view('tasks.flat', [
            'tasks' => Task::where('title',
            'LIKE', "%{$string}%")->prioritize()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $task = new Task;

        $task->title = $request->title;
        $task->description = $request->description;
        $task->creator_user_id = $request->creator_user_id;
        $task->priority = $request->priority;
        $task->status = $request->status;
        $task->parent_task_id = $request->parent_task_id;

        if ($task->parent_task_id === '0') {
            $task->parent_task_id = NULL;
        }

        $task->save();

        foreach($request->assigned_users as $user_id) {
            DB::table('assigned_users')->insert([
                'user_id' => $user_id,
                'task_id' => $task->id
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
