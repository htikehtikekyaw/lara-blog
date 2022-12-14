<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PageController extends Controller
{
    public function index(){
        $posts = Post::when(request('keyword'),function($q){
            $keyword = request('keyword');
            $q->orWhere('title','like',"%$keyword%")->orWhere('description','like',"%$keyword%");
        })->latest('id')->with(['user','category'])->paginate(10)->withQueryString();
        return view('index',compact('posts'));
    }

    public function detail($slug){
        $post = Post::where('slug',$slug)->with(['user','category','photos'])->first();
        return view('detail',compact('post'));
    }

    public function postByCategory(Category $category){
        $posts = Post::where(function($q){
            $q->when(request('keyword'),function($q){
                $keyword = request('keyword');
                $q->orWhere('title','like',"%$keyword%")->orWhere('description','like',"%$keyword%");
            });
        })->where('category_id',$category->id)->latest('id')->with(['user','category'])->paginate(10)->withQueryString();
        return view('index',compact('posts','category'));
    }

    public function postByUser(User $user){
        $posts = Post::where(function($q){
            $q->when(request('keyword'),function($q){
                $keyword = request('keyword');
                $q->orWhere('title','like',"%$keyword%")->orWhere('description','like',"%$keyword%");
            });
        })->where('user_id',$user->id)->latest('id')->with(['user','category'])->paginate(10)->withQueryString();
        return view('index',compact('posts','user'));
    }

    public function postByDay($day){
        $posts = Post::where(function($q){
            $q->when(request('keyword'),function($q){
                $keyword = request('keyword');
                $q->orWhere('title','like',"%$keyword%")->orWhere('description','like',"%$keyword%");
            });
        })->where('created_at',$day)->latest('id')->with(['user','category'])->paginate(10)->withQueryString();
        return view('index',compact('posts'));
    }
}
