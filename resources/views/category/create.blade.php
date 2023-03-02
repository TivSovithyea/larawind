@extends('layouts.app')

@section('content')
    <main>
        <div class="pt-6 px-4">
            <div class="text-center">
                <h2 class="text-2xl">Category</h2>
                <h5 class="text-sm">Fill form below to create category.</h5>
            </div>
        </div>
        <div class="justify-center">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="flex flex-col justify-center">
                    <div class='w-full md:w-1/6 px-3 mb-6'>
                        <label>Name</label>
                        <input
                            class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                            id='grid-text-1' type='text' placeholder='name' name="name" required>
                    </div>
                    <div class='w-full md:w-1/6 px-3 mb-6'>
                        <label>Description</label>
                        <input
                            class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                            id='grid-text-1' type='text' placeholder='description' name="description" required>
                    </div>
                    <div class='w-full md:w-1/6 px-3 mb-6'>
                        <button
                            class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <p class="text-sm font-medium leading-none text-white">Save</p>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
