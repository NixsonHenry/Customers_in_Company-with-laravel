            {{-- @if (count($errors)) 
            @endif --}}

            @if ($errors->any()) 
              <div class="md:flex md:items-center mb-6 my-1" role="alert">
                {{-- <div class=""></div> --}}
                <div class="w-full border border-0 border-red-100 rounded bg-red-100 p-4 text-red-700 font-sans">
                  <ul class="list-disc font-bold font-serif pl-8">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            @endif