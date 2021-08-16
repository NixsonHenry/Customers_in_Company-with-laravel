@extends('layouts.app')


@section('title', 'Contact Us')

@section('content')
    <main class="pb-16">
        <div class="flex sm:container sm:mx-auto sm:max-w-5xl sm:mt-10">
            <div class="w-full font-serif">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <header class="font-semibold bg-gray-200 text-gray-700 text-lg font-serif font-bold py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Contact Us') }}
                    </header>

                    @if(! session()->has('message'))
                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" action="{{ route('contact.store') }}" method="POST" >
                    
                        <div class="flex flex-wrap">
                            <label for="name" class="block text-gray-700 text-sm font-bold  sm:mb-4 pt-6">
                                {{ __('Name') }}:
                            </label>
                    
                            <input id="name" type="name"
                                class="form-input w-full @error('name') border-red-500 @enderror" name="name"
                                value="{{ old('name')}}" required autocomplete="name" autofocus>
                    
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    
                        <div class="flex flex-wrap">
                            <label for="email" class="block text-gray-700 text-sm font-bold sm:mb-4">
                                {{ __('Email') }}:
                            </label>
                    
                            <input id="email" type="email"
                                class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                
                        <div class="flex flex-wrap">
                            <label for="message" class="block text-gray-700 text-sm font-bold sm:mb-4">
                                {{ __('Message') }}:
                            </label>
                
                            <textarea name="message" id="message" type="message" cols="30" rows="10" class="form-input w-full border-gray-300 focus:outline-none" value="{{ old('message')}}" required autocomplete="message" autofocus></textarea>
                
                            @error('message')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                            class="select-none font-bold whitespace-no-wrap rounded-lg px-3 text-base leading-normal no-underline text-gray-100 bg-blue-700 hover:bg-blue-600 sm:py-3 focus:outline-none">
                                {{ __('Send Message') }}
                            </button>

                            @if (Route::has('register'))
                            <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                                {{ __("Don't have an account?") }}
                                <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </p>
                            @endif
                        </div>

                        @csrf
                    </form> 
                    @endif
                </section>
            </div>
        </div>
    </main>
@endsection
