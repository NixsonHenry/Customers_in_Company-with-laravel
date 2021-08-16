@extends('layouts.app')

@section('title', 'Add New Customer')

@section('content')
    <main class="pb-16">
        <div class="flex sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
            <div class="w-full font-serif">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
 
                    <header class="font-semibold bg-gray-200 text-gray-700 text-lg font-serif font-bold py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Add New Customer') }}
                    </header>

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" action="{{ route('customers.store')}}" method="POST" enctype="multipart/form-data">
                    
                        @include('customers.form')


                        <div class="flex flex-wrap">
                            <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Add Customer') }}
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
                    </form>

                </section>
            </div>
        </div>
    </main>
@endsection
