<?php

namespace App\Http\WebControllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Session;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::all();
        $users=User::all();
        $data=array();
        $data=User::where('id','=',  Auth::user()->id)->first();
        return view('showAllTasks')->with('tasks', $tasks)->with('users', $users)->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $taskObj = new Task;
        $taskObj->name = $request->name;
        $taskObj->description = $request->description;
        $taskObj->details = $request->details;
        $taskObj->done = $request->has('done');
        $taskObj->user_id = $request->user_id;
        $taskObj->save();
        return redirect('tasks');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks=Task::find($id);   
        return view('showOneTask')->with('tasks', $tasks);
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
        $taskObj = Task::find($id);
        $taskObj->name = $request->name;
        $taskObj->description = $request->description;
        $taskObj->details = $request->details;
        $taskObj->done = $request->has('done');
        $taskObj->user_id = $request->user_id;
        $taskObj->save();
        return redirect('tasks');
    }

    public function patch(Request $request, $id)
    {
        $taskObj = Task::find($id);
      
        if($taskObj->done == 1){
            //return back()->withErrors('Task is already submited');
            return "Task is already submited";
        }
        $taskObj->details = $request->details;
        $taskObj->done= $request->has('done');
        $taskObj->save();
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskToDelete = Task::find($id);
        $taskToDelete->delete();
        return redirect('tasks');
    }
}
