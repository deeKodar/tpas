<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Dzongkhag;
use App\Models\School;
use Illuminate\Support\Facades\Validator;

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
        $dzongkhags = Dzongkhag::all();
    	return view('users.create', compact('roles','dzongkhags'));


    }

    public function edit($id) {

    	$roles = Role::all();
        $dzongkhags = Dzongkhag::all();
        $schools = School::all();
    	$user = User::find($id);

    	return view('users.edit', compact('roles','user','dzongkhags','schools'));

    }

    public function schoolFromDzongkhag($id) {

        $schools = School::where('dzongkhag_id', $id)->get();
         echo "<option value='' selected disabled>Select a school</option>";
        foreach($schools as $school) {

            echo "<option value=".$school->id.">".$school->name."</option>";
        }
        
    }



    public function store(Request $request) {


  //   	$v =$this->validate($request, [
	 //    'user_name' => 'required|max:255',
	 //    'email' => 'required|unique:users|email',
	 //    'password' => 'required|max:255|min:6',
  //       'password_confirm' => 'required|min:6|same:password',
	 //    'role_id' => 'required',
        
		// ]);

     

        $v =Validator::make($request->all(), [
        'user_name' => 'required|max:255',
        'email' => 'required|unique:users|email',
        'password' => 'required|max:255|min:6',
        'password_confirm' => 'required|min:6|same:password',
        'role_id' => 'required',
        
        ]);

        $v->sometimes('dzongkhag_id', 'required', function ($input) {
            return request('role_id') == 3;
        });

        $v->sometimes(['dzongkhag_id','school_id'],'required', function($input) {
            return request('role_id') >3;
        });

       if ($v->fails()) {
            return redirect('users/create')
                        ->withErrors($v)
                        ->withInput($request->all());
        }

    	$user = new User;

    	$user->name = request('user_name');
    	$user->email = request('email');
    	$user->password = bcrypt(request('password'));
    	$user->role_id = request('role_id');
        $user->dzongkhag_id = request('dzongkhag_id');
        $user->school_id = request('school_id');
        

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



  //   	$this->validate($request, [
	 //    'user_name' => 'required|max:255',
	 //    'email' => 'required|email',
	 //    'role_id' => 'required'

    $v =Validator::make($request->all(), [
        'user_name' => 'required|max:255',
        'email' => 'required|unique:users,email,'.$id,
        'role_id' => 'required',
        
        ]);


        $v->sometimes('dzongkhag_id', 'required', function ($input) {
            return request('role_id') == 3;
        });

        $v->sometimes(['dzongkhag_id','school_id'],'required', function($input) {
            return request('role_id') >3;
        });

       if ($v->fails()) {
            return redirect('users/edit/'.$id)
                        ->withErrors($v)
                        ->withInput($request->all());
        }
    	$user = User::find($id);

    	$user->name = request('user_name');
    	$user->email = request('email');
    	$user->role_id = request('role_id');
        $user->dzongkhag_id = request('dzongkhag_id');
        $user->school_id = request('school_id');
        

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
