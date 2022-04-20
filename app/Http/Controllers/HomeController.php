<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostView;
use App\Models\Category;

class HomeController extends Controller
{
    //

    public function index(){
        //view()->share('grayBg', true);
        $data['latest_posts'] = Post::where('published',1)->where('menu', 0)->orderBy("id", "DESC")->get()->take(10);
        $data['featured_posts'] = Post::where('published',1)->where('menu', 1)->orderBy("id", "DESC")->get()->take(7);
       $data['trending_posts'] = Post::where('published',1)->where('menu', 2)->orderBy("id", "DESC")->get()->take(3);
        //$popular_posts = Post::where('published',1)->where('menu', 3)->orderBy("id", "DESC")->get()->take(3);
        $data['headline_posts'] = Post::where('published',1)->where('menu', 4)->orderBy("id", "DESC")->get()->take(2);

        return view('frontend.index', $data);
    }

    public function all_posts(Request $request){
        
        $posts = Post::where('published', 1)->orderBy("id", "DESC")
            ->paginate(11);
            $data['posts'] =  $posts;

        $data['trending_posts'] = Post::where('published',1)->where('menu', 2)
            ->orderBy("id", "DESC")->get()->take(3);

        $data['posts_count'] = $posts->count();
        $data['category'] = 'All Posts';

        return view('frontend.category_posts', $data); 
       
    }

    public function post_details(Request $request, $slug){

        $post = Post::where('slug', $slug)->first();

        $view = PostView::where('post_id', $post->id)->where('ip_address', $request->ip())->first();
        if(!$view){
            $view = new PostView();
            $view->post_id = $post->id;
            $view->ip_address = $request->ip();
            $view->save();
        }

        $data['post'] =  $post;
     
        $data['related_posts'] = Post::where('published', 1)->where('category_id', $post->category_id)
            ->where('id','!=', $post->id)->orderBy("id", "DESC")->get()->take(3);
            
        $data['trending_posts'] = Post::where('published',1)->where('menu', 2)
            ->orderBy("id", "DESC")->get()->take(7);
        return view('frontend.post_details', $data);
    }

    public function contact(){

        return view('frontend.contact');
    }

    public function about_us(){

        $data['trending_posts'] = Post::where('published',1)->where('menu', 2)
        ->orderBy("id", "DESC")->get()->take(7);

        return view('frontend.about-us', $data);
    }

    public function category_posts(Request $request){
        $category = Category::where('slug', $request->slug)->first();

        $data['posts'] = Post::where('published', 1)->where('category_id', $category->id)
            ->orderBy("id", "DESC")->paginate(11);

        $data['trending_posts'] = Post::where('published',1)->where('menu', 2)
            ->orderBy("id", "DESC")->get()->take(3);

        $data['posts_count'] = $category->posts->count();
        $data['category'] = $request->slug;
        return view('frontend.category_posts', $data);
    }

}

