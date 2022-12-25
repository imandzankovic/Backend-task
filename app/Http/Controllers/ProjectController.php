<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();
        $tasks=Task::all();
        $data=array();
        return $projects;
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
    
        $tasks = $request->input('tasks');
        foreach ($tasks as $task_Id){ 
        $projectObj = new Project;
        $projectObj->name = $request->name;
        $projectObj->description =$request->description;
        $projectObj->task_id = $task_Id;
        
        $projectObj->save();
    }

        return  $projectObj;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showOne($id)
    {   
        $project=Project::find($id);   
        return $project;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $projectObj = Project::find($id);
        $projectObj->name = $request->name;
        $projectObj->description = $request->description;
        $projectObj->task_id = $request->task_id;
        $projectObj->save();
        return $projectObj;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectToDelete = Project::find($id);
        $projectToDelete->delete();
        return true;
    }

}
