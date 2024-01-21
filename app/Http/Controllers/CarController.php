<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
use App\Models\User;
use App\Models\Category;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars= Car::get();
        return view ('admin/cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','categoryName')->get();
        return view('admin/addcar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->messages();
        
        $data = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string|max:5',
            'luggage'=>'required',
            'doors'=>'required',
            'passenger'=>'required',
            'price'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id'=>'required',
        ], $messages);

        $fileName= $this->uploadFile($request->image,'assets\images');

        $data['image'] = $fileName;

        $data['published'] = isset($request['published'])? true : false;

        Car::create($data);
        return "carRental";
    }

    public function messages()
    {

         return [
            'title.required'=>'This is required',
            'content.required'=>'This is required'
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
        $car = Car::findOrfail($id);
        $categories = Category::select('id','categoryName')->get();
        return view('admin/editCar', compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string|max:5',
            'luggage'=>'required',
            'doors'=>'required',
            'passenger'=>'required',
            'price'=>'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id'=>'required',
                ], $messages);
       
        $data['published'] = isset($request->published);


        // update image if new file selected
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image']= $fileName;
        }

        Car::where('id', $id)->update($data);
        return 'Updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Car::where('id',$id)->delete();
        return redirect('admin/cars');
    }

    // public function forceDelete(string $id): RedirectResponse
    // {
    //     Car::where('id',$id)->forceDelete();
    //     return redirect('admin/cars');
    // }

    // public function restore(string $id): RedirectResponse
    // {
    //     Car::where('id',$id)->restore();
    //     return redirect('admin/cars');
    // }
    // public function trashed() 
    // {
    //     $cars= Car::onlyTrashed()->get();
    //     return view('admin/trashedCars', compact('cars'));
    // }
}
