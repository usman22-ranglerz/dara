<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('users.index');   
    }

    public function create()
    {
     	return view('users.create');   
    }

    public function store(CreateUserRequest $request)
    {
    	$user = User::create($request->all());

    	return redirect()->route('user.assign' , ['id' => $user->id])->with('success' , 'User added Successfully!');
    }

    public function edit($id)
    {
    	$data['user'] = User::where('type' , 'user')->findOrFail($id);

    	return view('users.edit')->with($data);
    }

    public function update(UpdateUserRequest $request)
    {
    	$user = User::find($request->id);
    	$user->name = $request->name;
    	$user->phone = $request->phone;
    	$user->payments = $request->payments;
    	if($request->password){
    		$user->password = $request->password;
    	}
    	$user->paid_at = $request->paid_at;
    	$user->save();

    	return redirect()->route('users.index')->with('success' , 'User Updated Successfully!');
    }

    public function assign($id)
    {
    	$data['user'] = User::findOrFail($id);
    	$data['projects'] = Project::orderBy('name' , 'asc')->get();

    	return view('users.assign')->with($data);
    }

    public function post_assign(Request $request)
    {
    	$user = User::findOrFail($request->id);

    	$user->projects()->sync($request->projects);

    	return redirect()->route('users.index')->with('success' , 'Projects Assigned Successfully!');
    }
}
