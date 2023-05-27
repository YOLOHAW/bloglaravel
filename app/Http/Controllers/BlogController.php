<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index(){
        // dd($this->authorize('admin'));
       // dd(request('search'));
        return view('blogs.index',[
            'blogs'=>Blog::latest()->filter(request(['search','category','username']))->paginate(6)->withQueryString()
            // 'categories'=>Category::all()
          
        ]);
    }
    public function show(Blog $blog){
        return view('blogs.show',[
            'blog'=>$blog,
            'randomBlogs'=>Blog::inRandomOrder()->take(1)->get()
        ]);
    }
   public function subscriptionHandler(Blog $blog){
    // dd($blog); auth()->user()->isSubscribed($blog)
        if(User::find(auth()->id())->isSubscribed($blog)){
            $blog->unsubscribe();
        }else{
            $blog->subscribe();
        }
        return redirect()->back();
   }

}
