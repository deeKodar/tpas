<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Dzongkhag;

class UserController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index() {

     	$users = User::with('role')->get();

     	//dd($users);
     	return view('users.index', compact('users'));

    }

    public function create() {


    	$roles = Role::all();
        $roles = Dzongkhag::all();
    	return view('users.create', compact('roles'));


    }

    public function edit($id) {

    	$roles = Role::all();
    	$user = User::find($id);
    	return view('users.edit', compact('roles','user'));

    }

    public function store(Request $request) {


    	$this->validate($request, [
	    'user_name' => 'required|max:255',
	    'email' => 'required|unique:users|email',
	    'password' => 'required|max:255|min:6',
	    'role_id' => 'required'
		]);

    	$user = new User;

    	$user->name = request('user_name');
    	$user->email = request('email');
    	$user->password = bcrypt(request('password'));
    	$user->role_id = request('role_id');

    	if($user->save()){

    		 $request->session()->flash('message.level', 'success');
        	$request->session()->flash('message.content', 'User successfully created');
    		
    	}
    	else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Error creating user!');
    }

    	return redirect('/users');



    }

    public function update(Request $request, $id) {


    	$this->validate($request, [
	    'user_name' => 'required|max:255',
	    'email' => 'required|email',
	    'role_id' => 'required'
		]);

    	$user = User::find($id);

    	$user->name = request('user_name');
    	$user->email = request('email');
    	$user->password = bcrypt(request('password'));
    	$user->role_id = request('role_id');

    	if($user->save()) {

    		 $request->session()->flash('message.level', 'success');
        	$request->session()->flash('message.content', 'User successfully updated');
    		
    	}
    	else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Error!');
    }

    	return redirect('/users');



    }
    
    
}