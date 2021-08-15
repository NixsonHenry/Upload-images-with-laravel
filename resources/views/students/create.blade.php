@extends('layouts.app')

@section('content')
    @if (session('status'))
        <h6 class="text-lg py-2 border mx-auto px-4 mt-8 max-w-6xl rounded-md p-3 text-green-800 font-serif bg-green-100 ">
            <strong class="pl-4">Success: </strong>{{ session('status') }}
        </h6>
    @endif

    <div class="">
        
        <div class="py-2 border mx-auto px-4 border-gray-200 bg-gray-100  font-serif mt-4 max-w-6xl rounded-t">
            <div class="flex justify-between font-semibold ">
                <span class="mt-1 text-lg">Add Student with IMAGE </span>
                <a href="{{ route('students') }}" class="py-1 px-3 text-md text-gray-200 border bg-red-600 hover:bg-red-700 rounded-md">BACK</a>
            </div>
        </div>
        
        <div class="py-4 border mx-auto px-4 border-gray-200 font-serif max-w-6xl">

            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="max-w-6xl mx-auto ">
                    <label for="name" class="block text-gray-700 text-md font-bold my-1 mt-2">Student Name</label>
                    <input id="name" type="text" name="name" class="w-full form-input border focus:outline-none pl-3 py-1 mb-5 hover:border-blue-500 rounded-md  @error('name') bg-gray-200 @enderror" value="{{ old('name') }}"required autocomplete="name" autofocus>
                </div>
                
                <div class="max-w-6xl mx-auto ">
                    <label for="Student Email" class="block text-gray-700 text-md font-bold my-1">Student Email</label>
                    <input id="Student Email" type="text" name="email" class="w-full form-input border focus:outline-none pl-3 py-1 mb-5 hover:border-blue-500 rounded-md  @error('email') bg-gray-200 @enderror" value="{{ old('email') }}"required autocomplete="email" autofocus>
                </div>

                <div class="max-w-6xl mx-auto ">
                    <label for="Student Course" class="block text-gray-700 text-md  font-bold my-1">Student Course</label>
                    <input id="course" type="text" name="course" class="w-full form-input border focus:outline-none pl-3 py-1 mb-5 hover:border-blue-500 rounded-md @error('course') bg-gray-200 @enderror" value="{{ old('course') }}"required autocomplete="course" autofocus>
                </div>

                <div class="max-w-6xl mx-auto ">
                    <label for="profile_image" class="block text-gray-700 text-md  font-bold my-1">Student Profile Image</label>
                    <input id="profile_image" type="file" name="profile_image" class="w-full form-input border focus:outline-none pl-3 py-1 hover:border-blue-500 rounded-md @error('profile_image') bg-gray-200 @enderror" value="{{ old('profile_image') }}"required autocomplete="profile_image" autofocus>
                </div>

                <div class="max-w-6xl mx-auto ">
                <button type="submit"
                    class="mt-4 p-3 rounded-md text-base leading-normal no-underline text-gray-100 bg-blue-600 hover:bg-blue-700 sm:py-2">
                    Save Student
                        {{-- {{ __('Add Customer') }} --}}
                </button>
            </div>


                    {{-- <div class="flex flex-wrap py-2">
                
                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div> --}}

            </form>
        </div>
    </div>
@endsection
