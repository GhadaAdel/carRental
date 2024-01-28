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
        
        $cars= Car::latest()->paginate(pagination_count);
        // foreach ($cars as $car) {
        //     $car->limitedDescription = Str::words($car->content, 50, '...');
        // }
    
        // $car = Str::limit('xcvfgh', 20); 
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
        $cars= Car::latest()->paginate(pagination_count);
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
    // public function sendEmail(Request $request) {
    //     $details = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'subject' => $request->subject,
    //         'msg' => $request->msg,
    //     ];
    //     Mail::to('ghada@gmail.com')->send(new ContactMail($details));
    //     return back()->with('message_sent', 'Ur message has been sent succesfullyyyy');

    // }
    public function testimonial()
    {
        return view('testimonial');
    }

    public function facilities()
    {
        return view('facilities');
    }

    public function team()
    {
        return view('team'); 
    }

    public function action()
    {
        return view('action');
    }

    public function appointment()
    {
        return view('appointment');
    }

    public function error404()
    {
        return view('404page');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
