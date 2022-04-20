<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use App\Models\Notification;
use App\Models\User;
use App\Events\PostProcessed;
use Illuminate\Support\Facades\Gate;
use App\Traits\UploadAble;

class BlogController extends Controller
{
    use UploadAble;

    //
    public function index(){

        $posts = Post::orderBy('id','Desc')->get();
        return view('admin.blog.index', compact('posts'));
    } 
        
    public function create(){
        
        $categories = Category::orderBy('name','ASC')->get();
        return view('admin.blog.create', compact('categories'));
    } 

    public function save(Request $request) {
     
        $this->validate($request,[
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'description' => 'required|string',
            'image'  =>  'required|mimes:jpg,jpeg,png|max:1000'
        
        ]);
        $params = $request->except('_token');
        
        $params['image'] = $this->uploadOne($request->image, 'blog');
        $params['user_id'] = auth()->user()->id;
        
        
        $record = Post::create($params);
        if ($record) {
            
            Session()->flash('message', 'Record Added Successfully');
            return redirect('blog/index');;
        }
        

    }

    public function edit (request $request) {
        $post = Post::where('id', $request->id)->first();
        $response = Gate::inspect('can_edit', $post);
        if ($response->allowed()) {
            $categories = Category::all();
            return view('admin.blog.edit', compact('post', 'categories'));
        }
        else {
            echo $response->message();
        }  
        
    }


 
    public function update(request $request) {

        $this->validate($request,[
        'title' => 'required|string',
        'description' => 'required|string',
        'sub_title' => 'required|string',
        'image'  =>  'mimes:jpg,jpeg,png|max:2000'
     
        ]);
        
        $post = Post::where('id', $request->id)->first();
        $response = Gate::inspect('can_update', $post);
        if ($response->allowed()) {
            $params = $request->except('_token', 'image');
            if ($request->image) {
                $this->deleteOne('blog', $post->image);

                $params['image'] = $this->uploadOne($request->image, 'blog');
            }
            $post->update($params);

            Session()->flash('message', 'Record Updated Successfully');
            return redirect()->back();
        }
        else {
            echo $response->message();
        }  
        
    }
    
    public function blog_detail(request $request) {
     
        $blog = Post::where('slug', $request->slug)->first();
        $recent = Post::where('slug', '!=', $request->slug)->orderBy('id','Desc')->take(5)->get();
        return view('main.blog-detail', compact('blog', 'recent'));
    }

    public function update_menu(request $request)

    {   
        $post = Post::find($request->id);
        $response = Gate::inspect('editor');
        if ($response->allowed()) {

           $data = $post->update($request->except('_token', 'id'));
        
            Session()->flash('message', 'Record Updated Successfully');
            return redirect()->back(); 
        }
        else {
            echo $response->message();
        }
    }

    public function publish(request $request)
    {   
        $post = Post::find($request->id);
        $response = Gate::inspect('editor');
        if ($response->allowed()) {
            $post->update($request->except('_token', 'id'));
          
            Session()->flash('message', 'Record Updated Successfully');
            return redirect()->back(); 
        }
        else {
            echo $response->message();
        }
    }

    public function user_post(){

        $posts = Post::where('user_id', auth()->user()->id)->orderBy('id','Desc')->get();
        return view('admin.blog.user_posts', compact('posts'));
    }
 

    public function delete(request $request) {
        
        $post = Post::where('id', $request->id)->first();
        $response = Gate::inspect('can_delete', $post);
        if ($response->allowed()) {
            
            $data = $post->delete();
            if ($data) {
                $this->deleteOne('blog', $post->image);

                Session()->flash('message', 'Post Deleted Successfully');
                return redirect()->back();
            }
        }
        else {
            echo $response->message();
        }  
    }  

    
}
