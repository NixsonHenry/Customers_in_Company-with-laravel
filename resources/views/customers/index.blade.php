@extends('layouts.app')

@section('title', 'Add New Customer')

@section('content')   
{{-- container mx-auto flex justify-between items-center --}}

    <div class="md:items-center sm:ml-36 w-full max-w-6xl pt-6 pb-4 font-serif px-3">
        <h1 class="text-4xl font-bold ">Customer List</h1>
        <p class="text-blue-500 hover:text-blue-800 text-md font-bold mt-4 "><a href="customers/create">Add New Customer</a></p>
    </div>

    <div class="md:items-center sm:ml-36 w-full max-w-6xl pt-6 pb-4 font-serif px-3">
       
        @foreach ($customers as $customer)
        <div class="md:items-center flex font-serif my-1">
            <div class="w-2/12">
                {{-- {{ $customer->id }} --}}
                {{ ++$i }}
            </div>

            <div class="w-4/12 text-blue-500 hover:text-blue-800 text-md">
                <a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a>
            </div>

            <div class="w-4/12">
                {{ $customer->company->name }}
            </div>

            <div class="w-2/12">
                {{ $customer->active }}
            </div>
        </div>
        @endforeach

    </div>
   
@endsection