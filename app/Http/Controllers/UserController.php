<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::get();
        return view ('admin/users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->messages();
        
        $data = $request->validate([
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required',
            'password'=>'required',
        ], $messages);

        $data['published'] = isset($request['published'])? true : false;

        User::create($data);
        return "UserDone";
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
        $user = User::findOrfail($id);
        return view('admin/editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required',
        ], $messages);

        $data['published'] = isset($request->published);

        User::where('id', $id)->update($data);
        return 'UserUpdated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        User::where('id',$id)->delete();
        return redirect('admin/users');
    }
}
