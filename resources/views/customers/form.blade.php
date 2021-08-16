<div class="">
    
    <div class="flex flex-wrap py-2">
        <label for="name" class="block text-gray-700 text-sm font-bold mt-5 mb-4">
            {{ __('Name') }}:
        </label>

        <input id="name" type="name"
            class="form-input w-full @error('name') border-red-500 @enderror" name="name"
            value="{{ old('name') ?? $customer->name }}" required autocomplete="name" autofocus>

        @error('name')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="flex flex-wrap py-2">
        <label for="email" class="block text-gray-700 text-sm font-bold mt-5 mb-4">
            {{ __('Email') }}:
        </label>

        <input id="email" type="email"
            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
            value="{{ old('email') ?? $customer->email }}" required autocomplete="email" autofocus>

        @error('email')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="mt-4 py-2">
        <label for="active" class="font-bold ">Status:</label>
        <div class="form-input mt-3">
            <select name="active" id="active" class="w-full focus:outline-none">
                <option value="" disabled>Select customer status</option>
                @foreach ($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
                    <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
                @endforeach
            </select>

            @error('active')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror
        </div>
    </div>

    <div class="mt-4 py-2">
        <label for="company_id" class="font-bold mt-5 mb-4">Company_id:</label>
        <div class="form-input mt-3">
            <select name="company_id" id="company_id" class="w-full focus:outline-none">
                @foreach ($companies as $company)
                    <option value=" {{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : ''}}>{{ $company->name }}</option>              
                @endforeach
            </select>

            @error('company->name')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            @enderror
        </div>
    </div>


    <div class="flex flex-wrap pt-6">
        <label for="image" class="block text-gray-700 text-sm font-bold sm:mb-4">
            {{ __('Profile Image') }}:
        </label>
{{-- 
        <input id="image" type="file" name="image" class="form-input w-full bg-gray-100 hover:bg-gray-200 @error('email') border-red-500 @enderror" > --}}
        <input id="image" type="file" name="image" class="w-full form-input border focus:outline-none pl-3 bg-gray-100 hover:bg-gray-200 rounded-md @error('image') @enderror" required autocomplete="image" autofocus>
        

        @error('image')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    @csrf

</div>