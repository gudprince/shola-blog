<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Hash;
use  App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    //

    public function index(Request $request)
    {   
       
        $users = User::all();
        return view('admin.user.index',compact('users'));
       
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            return view('admin.user.create');
        }
        else {
            echo $response->message();
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'user_type' => 'required|not_in:0',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
        
            $input = $request->except('_token');
            $input['password'] = Hash::make($input['password']);
        
            $user = User::create($input);
            if($user) {
                Session()->flash('message', 'User Added Successfully');
                return redirect('user');
            }
        }
        else {
            echo $response->message();
        }
    }
    
  
    public function show($id)
    {   
        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            $user = User::find($id);
            return view('admin.user.show',compact('user'));
        }
        else {
            echo $response->message();
        }
    }
    
    public function edit(request $request)
    {   
        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            $user_type = ['user', 'admin', 'editor','super_admin'];
            $user = User::find($request->id);

            return view('admin.user.edit',compact('user', 'user_type'));
        }
        else {
            echo $response->message();
        }
    }
    
    public function update(Request $request)
    {   
        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            $data = $request->except('token','id', 'password');
            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }
            $user = User::find($request->id);
            $user->update($data); 
            if($user) {
                Session()->flash('message','User Updated successfully');
                return redirect('user');
            }
        }
        else {
            echo $response->message();
        }
    } 
    
    public function delete(request $request)
    {    
        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            $user = User::where('id', $request->id)->first();
            $user->delete();
            if ($user) {

                Session()->flash('message','User Updated successfully');

                return redirect('user');
            }
        }
        else {
            echo $response->message();
        }
    }

    public function profile_edit(request $request)
    {   
        $user = User::find(auth()->user()->id);

        return view('admin.user.profile_edit',compact('user'));
    }

    public function profile_update(Request $request)
    {   
        //dd($request->all());
        $user = User::find(auth()->user()->id);
        $user->update($request->except('_token')); 
        if($user) {
            Session()->flash('message','Recorded Updated successfully');
            return  redirect('profile');   
        }
    }

    public function password_reset(request $request) {

        $this->validate($request,[
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:8',
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        $record = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
           if ($record) {
               Session()->flash('message', 'Record Updated Successfully');
               return redirect()->back();
           }
    }

    public function dashboard(){
        
        $postTotal = Post::all()->count();
        $publishPost = Post::where('published', 1)->get()->count();
        $UnpublishPost = Post::where('published', 0)->get()->count();
        $admin = User::all()->count();
        $category = Category::all()->count();

        return view('admin.dashboard',compact('postTotal','publishPost', 'UnpublishPost','category', 'admin'));
    }

}