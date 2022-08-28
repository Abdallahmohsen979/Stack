<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskCollection;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TaskCollection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task=new Task;
        $task->create($request->all());
        return response()->json("Success ", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new  TaskResource(Task::find($id));

    }
    public function showTasksOfUser($id)
    {
        return new  TaskCollection(Task::where('user_id','=',$id)->get());

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
        $task=Task::find($id);
        $task->update($request->all());
        return response()->json(new TaskResource($task), 200);
    }
     /**
     * Update the status of  task to be done
     *

     */
    public function submitTask(Request $request, $id)
    {
        $task=Task::find($id);
        if($task->status="done")
        {
            return "this task  cannot be edited";
        }
        $task->update(
            [

                $task->status=$request->status

           ]);
        return response()->json(new TaskResource($task), 200);
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
