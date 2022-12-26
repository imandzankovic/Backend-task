<?php

namespace App\Http\WebControllers;

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
        if(Session::has('loginId')){
            $data=User::where('id','=', Session::get('loginId'))->first();
        }
        return view('showAllProjects')->with('projects', $projects)->with('tasks', $tasks)->with('data',$data);
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
        
        $tasks = $request->input('tasks');
        foreach ($tasks as $task_Id){ 
        $projectObj = new Project;
        $projectObj->name = $request->name;
        // $projectObj->customer = $request->customer;
        $projectObj->description =$request->description;
        $projectObj->task_id = $task_Id;
        
        $projectObj->save();
    }
        return redirect('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
       // $projectToShow = Project::find($id);
       // $projectToDelete->delete();
       // return redirect('projects/{projectToShow}');
    //}
    public function show($id)
    {   
        $projects=Project::find($id);   
        return view('showOneProject')->with('projects', $projects);
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
        // $projectObj->customer = $request->customer;
        $projectObj->description = $request->description;
        $projectObj->task_id = $request->task_id;
        $projectObj->save();
        return redirect('projects');
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
        return redirect('projects');
    }

}
