<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'))->with('i');
    }

    public function create()
    {
        return view('students.create'); 
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');
        if($request->hasfile('profile_image')) 
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }   
        $student->save();

        return redirect()->back()->with('status', 'Student Image Added Successfully');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        // dd($student->name);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {   
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');
    
        if($request->hasfile('profile_image')) 
        {   
        // To delete the image (the file) if it exists
            $destination = 'uploads/students/'.$student->profile_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }   
        $student->update();

        return redirect()->back()->with('status', 'Student Image Updated Successfully');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $destination = 'uploads/students/'.$student->profile_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $student->delete();
        return redirect()->back()->with('status', 'Student Image deleted Successfully');

    }

}
