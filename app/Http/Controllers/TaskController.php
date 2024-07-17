<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    function index() {
        // $tasks = Task::all();
        // //select * from tasks

        // $tasks = Task::limit(10)->get();
        // //select * from tasks limit 10

        // $tasks = Task::latest()->limit(10)->get();
        // //select * from tasks orderby created_at desc limit 10

        // $tasks = Task::where ('id', '<', 30)->get();
        // //select * from tasks where id <30

        // $tasks = Task::where ('id', '<=', 30)
        //             ->where('id','>=','20')->get();

        // $tasks = Task::whereBetween ('id',[20,30],)->get();
        // //select * from tasks where id between 20 dan 30

        // $tasks = Task::where ('id','=',10)->get();
        // //select * from tasks where id 10

        // $tasks = Task::where ('title','like','%magnam%')->get();
        // //select * from tasks where title magnam

        // $tasks = Task::find(10);

        //$tasks = Task::all();
        $tasks = Task::with('user')->get();

        return view('task.index', compact ('tasks'));

        //dd($tasks);

    }

    function show(Task $task) {
        $task = $task->load('comments.user','user');
        return view('task.show', compact('task'));

    }

    //function store

    /**
     * Get the user that owns the TaskController
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment(): BelongsTo
    {
        return $this->belongsTo(User::class, 'task_id', 'id');
    }

    function ajaxloadtasks(Request $request) {
        $tasks = Task::with('user');

        return DataTables::of($tasks)
        ->addIndexColumn()
        ->addColumn('bil', function($task){
            return '1';
        })
        ->addColumn('due_date', function($task){
            return \Carbon\Carbon::parse($task->due_date)->format('d-m-Y');
        })

        ->addColumn('user', function($task){
            return $task->user->name;
        })
        ->addColumn('action', function($task){
            return '<a class="btn btn-primary btn-sm" href="'.route('tasks.show',['task'=>$task->uuid]).'">Show</a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    //
}
