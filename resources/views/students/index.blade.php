@extends('layouts.app')

@section('content')
    {{-- <div> --}}
        <div class="text-lg py-2 border-2 mx-auto px-4 border-gray-200 bg-gray-100  font-serif mt-12 max-w-6xl">
            <h4 class="flex justify-between font-semibold h-auto">
                <span class="mt-2">Laravel 8 IMAGE CRUD </span>
                <a href="{{ route('students.create') }}" class="py-2 px-3 text-sm text-gray-200 border-2 bg-blue-600   hover:bg-blue-700 rounded-md">Add Student</a>
            </h4> 
        </div>  <div class="py-4 border mx-auto px-4 border-gray-200 font-serif max-w-6xl">

       
        <div class=" ">
                
           <table class="table-auto w-full max-w-6xl mx-auto font-serif py-4 px-4 border border-gray-200">
            <thead class="border">
                <tr class="">
                    <th class="w-1/12 border-r text-left pl-2">ID</th>
                    <th class="w-2/12 border-r text-left pl-2">Name</th>
                    <th class="w-3/12 border-r text-left pl-2">Email</th>
                    <th class="w-2/12 border-r text-left pl-2">Course</th>
                    <th class="w-2/12 border-r text-left pl-2">Image</th>
                    <th class="w-1/12 border-r text-left pl-2">Edit</th>
                    <th class="w-1/12 text-left pl-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                @if ( "{{ $i % 2 == 0, ' ' }}" )
                    
                    <tr class="bg-gray-100">
                        <td class="border-r border-b pl-2 ">{{ ++$i }}</td>
                        <td class="border-r border-b pl-2 ">{{ $student->name }}</td>
                        <td class="border-r border-b pl-2 ">{{ $student->email }}</td>
                        <td class="border-r border-b pl-2 ">{{ $student->course }}</td>
                        <td class="border-r border-b pl-2 py-2">
                            <img class="w-16 h-10 rounded-md" src="{{ asset('uploads/students/'.$student->profile_image) }}"  alt="Image">
                        </td>
                        <td class="border-r border-b pl-2">
                            <a class="px-3 py-2 border bg-blue-700 rounded-md text-white hover:bg-blue-600" href="{{ route('students.edit', $student->id) }}">Edit</a>
                        </td>
                        <td class="pl-2">
                           <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 border bg-red-700 hover:bg-red-600 rounded-md text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach 
            </tbody> 
        </table> 
           
        </div>
    
@endsection
