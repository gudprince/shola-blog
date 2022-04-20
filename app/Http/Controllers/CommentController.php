<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Events\CommentProcessed;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostComment;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{   
    public function save(request $request) {
        
        $params = $request->except('id', '_token');

        //if user is authenticated store the login user details else store guest details
        if(Auth()->check()){

            $params['user_id'] = Auth()->user()->id; 
        }

        $post = Post::where('id', $request->id)->first();
        $data = $post->comments()->create($params);

        if($data) {
            
           
            if(Auth()->check()){

                $response['name'] = Auth()->user()->first_name.' '.Auth()->user()->last_name; 
            }
            else{
                $response['name'] = $data->guest_full_name;
            }

            $user = User::find($post->user_id);
            CommentProcessed::dispatch($post, $user, $response['name']);

            $response['content'] = $data->content;
            $response['date'] = $data->created_at->diffForHumans();
            $response['message'] = 'Comment Added Successfully';
            return response()->json($response);
        }

    }

    public function delete(request $request) {

        $comment = Comment::where('id', $request->id)->first();
        $response = Gate::inspect('can_delete_comment', $comment );
        if ($response->allowed()) {
            
            $data = $comment->delete();
            if ($data) {
            
                Session()->flash('message', 'Comment Deleted Successfully');
                return redirect()->back();
            }
        }
        else {
            echo $response->message();
        }    
    }

   
}