<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function index(){
         return view('frontend.index');
    }
    public function about(){
         return view('frontend.about');
    }
    public function contact(){
         return view('frontend.contact');
    }
    public function blog(){
         return view('frontend.blog');
    }
    public function policy(){
         return view('frontend.policy');
    }
    public function terms(){
         return view('frontend.terms');
    }
    public function faq(){
         return view('frontend.faq');
    }
    public function post(){
         $post = Post::orderBy('id', 'desc')->paginate(6);
         return view('frontend.blog',['post'=>$post]);
    }
    public function postDetails(Post $post) {
         $recentblog = Post::latest('id')->get();
         return view('frontend.single-blog',['post'=>$post, 'recent'=>$recentblog]);
    }
    public function Services(){
         return view('frontend.service');
    }
}
