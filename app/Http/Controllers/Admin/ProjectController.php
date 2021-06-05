<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Client;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Client List For Show  in DropDown
        $clients = Client::select('client_name','id')->get();
        return view('admin.project.create',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        if($request->hasFile($request->plan_report_url)){
        
        $data = $request->except('_token','_method','plan_report_url');
        $filePath = $this->fileToUpload($request->plan_report_url);
        $path = array('plan_report_url' => $filePath);
        $info = array_merge($data,$path);
        $store = Project::create($info);
        }else{
            $data = Project::create($request->except('_token','_method','plan_report_url'));
        }
        return redirect()->back()->with('success','Project Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Client List For Show  in DropDown
        $clients = Client::select('client_name','id')->get();
        $project = Project::findOrFail($id);
        return view('admin.project.edit',compact('project','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, $id)
    {
       if($request->hasFile($request->plan_report_url)){
        
        $data = $request->except('_token','_method','plan_report_url');
        $filePath = $this->fileToUpload($request->plan_report_url);
        $path = array('plan_report_url' => $filePath);
        $info = array_merge($data,$path);
        $update = Project::find($id)->update($info);
         return redirect('/admin/project')->with('success','Project Updated Successfully!');
       }else{
         
        $update = Project::find($id)->update($request->except('_token','_method','plan_report_url'));
        return redirect('/admin/project')->with('success','Project Updated Successfully!');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Project::find($id)->delete();
        return redirect()->back()->with('success','Project Deleted Successfully!');
    }
    /**
     * This Methode Is for upoading the file 
     */
    public function fileToUpload($file)
    {
                   
        $fileName = uniqid().time().'.'.str_replace(' ', '_', $file->getClientOriginalName());  
          
        $file->move(public_path('uploads/files'), $fileName);
             
        return '/uploads/files/'.$fileName;
          
    }

}
