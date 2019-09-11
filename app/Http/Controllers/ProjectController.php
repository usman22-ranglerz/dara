<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectDataTable;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('projects.index');   
    }

    public function create()
    {
     	return view('projects.create');   
    }

    public function store(CreateProjectRequest $request)
    {
    	Project::create($request->all());

    	return redirect()->route('projects.index')->with('success' , 'Project added Successfully!');;
    }
}
