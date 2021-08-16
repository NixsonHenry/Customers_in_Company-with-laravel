@extends('layouts.app')


@section('title', 'Details for '. $customer->name)

@section('content')
    <div class="md:items-center sm:ml-32 w-full max-w-6xl font-serif pl-7">
        <h1 class="text-gray-700 text-4xl font-bold py-4">
                Details for {{ $customer->name }}
        </h1>
        
        <div class="flex justify-between">
            <div class="flex justify-between">
                <div class="w-1/2">
                    @if($customer->image)
                    <div class="font-serif my-4 h-35 w-24">
                        <img class="rounded-md" src="{{ asset('uploads/customers/'.$customer->image) }}"  alt="Image">
                    </div>
                @endif
                </div>

                <div class="font-serif text-gray-700 my-4 mx-32">
                    <p class="my-2"><strong>Name</strong> {{ $customer->name }}</p>
                    <p class="my-2"><strong>Email</strong> {{ $customer->email }}</p>
                    <p class="my-2"><strong>Company</strong> {{ $customer->company->name }}</p>
                </div>
            </div>
            
            <div class="mr-20 my-4 ">
                <div class="pb-4">
                    <a href="{{ route('customers.edit', $customer->id) }}"><svg class="h-8 text-blue-500 hover:text-blue-800 my-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></a>
                      </svg>
                </div> 
        
                <form class="" action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    
                    <button type="submit" class="focus:outline-none"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600 hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg></button>
                </form>
            </div>
        </div>

    </div>   
@endsection
 