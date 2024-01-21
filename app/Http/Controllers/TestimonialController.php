<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;  

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials= Testimonial::get();
        return view ('admin/testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/addTestimonials');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->messages();
        
        $data = $request->validate([
            'name'=>'required|string',
            'content'=>'required|string',
            'position'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        $fileName= $this->uploadFile($request->image,'assets\images');

        $data['image'] = $fileName;
        
        $data['published'] = isset($request['published'])? true : false;

        Testimonial::create($data);
        return "TestimonialDone";
    }

    public function messages()
    {

         return [
            'name.required'=>'This is required',
            'username'=>'required|string',
            'email.required'=>'This is required',
            'password.required'=>'This is required',
            ];
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
        $testimonial = Testimonial::findOrfail($id);
        return view('admin/editTestimonials', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'name'=>'required|string',
            'content'=>'required|string',
            'position'=>'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        $data['published'] = isset($request->published);

        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image']= $fileName;
        }

        Testimonial::where('id', $id)->update($data);
        return 'TestimonialUpdated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Testimonial::where('id',$id)->delete();
        return redirect('admin/testimonials');
    }
}
