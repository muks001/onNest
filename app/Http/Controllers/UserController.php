<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request)
    {
        $users = User::paginate(10);
        return view('admin.user.index',compact('users'));
    }

    function create() 
    {
        return view('admin.user.create');
    }

    function store(Request $request) 
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'emp_code'=>'required',
            'mobile_no'=>'required',
            'location'=>'required',
            'image'=>'nullable',
            'department'=>'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->emp_code = $request->emp_code;
        $user->mobile_no = $request->mobile_no;
        $user->location = $request->location;
        $user->department = $request->department;
        $user->password = \Hash::make(trim('Test@12345'));

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            // Move the file to the public directory
            $path = $request->file('image')->move(public_path('user'), $filename);
            // Store the path relative to the public directory
            $user->image = 'user/' . $filename;
        }
    
        $user->save();
        return redirect()->route('admin.users')->with('success','added successfully');
        
    }
}
