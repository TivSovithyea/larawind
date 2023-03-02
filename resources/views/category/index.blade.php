@extends('layouts.app')

@section('content')
    <main>
        <div class="pt-6 px-4">
            <div class="text-center">
                <h2 class="text-2xl">Category</h2>
                <h5 class="text-sm">Listing all categories.</h5>
            </div>
            <!-- component -->
            <livewire:category-datatable></livewire:category-datatable>
        </div>
    </main>
@endsection
