<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index() {
        $tasks = Task::all();
        //select * from tasks

        $tasks = Task::limit(10)->get();
        //select * from tasks limit 10

        $tasks = Task::latest()->limit(10)->get();
        //select * from tasks orderby created_at desc limit 10

        $tasks = Task::where ('id', '<', 30)->get();
        //select * from tasks where id <30

        $tasks = Task::where ('id', '<=', 30)
                    ->where('id','>=','20')->get();

        $tasks = Task::whereBetween ('id',[20,30],)->get();
        //select * from tasks where id between 20 dan 30

        $tasks = Task::where ('id','=',10)->get();
        //select * from tasks where id 10

        $tasks = Task::where ('title','like','%magnam%')->get();
        //select * from tasks where title magnam

        $tasks = Task::find(10);


        dd($tasks);
        // dd($task->user->name);
        // dd($task->user->tasks);
        // dd($tasks->user->tasks->last()->title);

    }

    /**
     * Get the user that owns the TaskController
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment(): BelongsTo
    {
        return $this->belongsTo(User::class, 'task_id', 'id');
    }
    //
}
