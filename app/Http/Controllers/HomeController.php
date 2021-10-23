<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Doctor;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'doctors' => Doctor::all(),
            'posts' => Post::all()->take(3)
        ]);
    } 
    
    public function about()
    {
        return view('home.about', [
            'doctors' => Doctor::all()->take(3)
        ]);
    }

    public function blogDetails()
    {
        return view('home.blog-details', [
            'post' => Post::first(),
            'posts' => Post::all()->skip(1)->take(2),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function blog()
    {
        return view('home.blog', [
            'posts' => Post::all(),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function doctors()
    {
        return view('home.doctors', [
            'doctors' => Doctor::all()
        ]);
    }
}
