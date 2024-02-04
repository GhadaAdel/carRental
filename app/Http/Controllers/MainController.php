<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index()
    {
        
        $cars= Car::where('published', 1)->latest()->take(6)->paginate(pagination_count);
        
        $test = Testimonial::latest()->take(3)->get();
        return view('web/index', compact('cars','test'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page');
    }

    public function about()
    {
        return view('web/about');
        
    }

    public function blog()
    {
        return view('web/blog');
    }

    public function contact()
    {
        return view('web/contact');
    }

    public function carList()
    {
        $cars= Car::where('published', 1)->paginate(pagination_count);
        return view('web/listing', compact('cars'));
    }
    
    public function main()
    {
        return view('web/main');
    }

    public function single(string $id)
    {
        $car = Car::findOrfail($id);
        $categories = Category::withCount('cars')->get();
        return view('web/single', compact('car','categories'));
    }

    public function testimonials()
    {
        $test = Testimonial::latest()->take(3)->get();
        return view('web/testimonials', compact('test'));
    }
    
}
