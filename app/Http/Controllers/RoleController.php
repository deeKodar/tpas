<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use View;

class RoleController extends Controller
{
   
     public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index() {

     	$roles = Role::with('permissions')->get();
     	return view('roles.index', compact('roles'));

    }

    public function edit($id) {

        $roles = Role::with('permissions')->get()->where('id',$id);

        return view('roles.edit', compact('roles'));
    	// return View::make('roles.edit')
    	// ->with('role', Role::find($id)
     //    ->with('permissions'));

    }

    public function create() {


    	return view('roles.create');
    }


	public function store() {

		$role = new Role;
		$role->name = request('role_name');
		$role->label = request('role_label');

		if($role->save()){

             $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Role successfully created');
            
        }
        else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Error!');
    }

		return redirect('/roles');

	}
    public function update($id) {

    	$role = Role::find($id);

    	$role->name = request('role_name');
    	$role->label = request('role_label');

    	if($role->save()){
        

             $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'User successfully updated');
            
        }
        else{
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Error!');
    }


    	return redirect('/roles');

    }


    public function view($role) {

        $role = Role::with('permissions')->get()->where('id',$role);
        //$role=Role::get()->where('id',$role);
        //dd($role);
        return view('roles.view', compact('role'));
    }
}
