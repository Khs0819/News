<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        $sliders = Slider::take(3)->get();
        $articles = Article::orderBy('updated_at','desc')->take(3)->get();
        $categories = Category::where('status' , 'فعال')->get();
        return response()->view('website.index',compact('sliders','categories','articles'));
    }

    public function details($id){
        $articles = Article::findOrFail($id);
        return response()->view('website.newsdetailes',compact('articles'));
    }
    public function all($id){
        $categories = Category::findOrFail($id);
        $articles = Article::where('category_id',$categories->id)->paginate(5);
        return view('website.all-news',compact('categories','articles'));
    }
}