<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostApiController extends Controller
{
    public function index()
    {
        $posts = Post::when(request('keyword'),function($q){
            $keyword = request('keyword');
            $q->orWhere('title','like',"%$keyword%")->orWhere('description','like',"%$keyword%");
        })->latest('id')->with(['category','user'])->paginate(30)->withQueryString();
        
        // return $posts;
        return response()->json($posts);
    }

    public function detail($slug){
        $post = Post::where('slug',$slug)->with(['user','category','photos'])->first();
        return response()->json($post);
    }
}
