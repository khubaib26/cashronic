<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

     <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('user.update')}}">
                  @csrf
                  @method('put')
                  <div class="flex flex-col space-y-2">
                    <label for="name" class="text-gray-700 select-none font-medium">Name</label>
                    <input id="name" type="text" name="name" value="{{ Auth::guard('front')->user()->name }}"
                      placeholder="Enter name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                  <div class="flex flex-col space-y-2">
                    <label for="email"  class="text-gray-700 select-none font-medium">Email</label>
                    <input id="email" type="email" name="email" readonly disabled value="{{ Auth::guard('front')->user()->email }}"
                      placeholder="Enter Email" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="password"  class="text-gray-700 select-none font-medium">Password</label>
                    <input id="password" type="password" name="password" 
                      placeholder="Enter Password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
        
    
              
                <div class="text-center mt-16 mb-16">
                  <button type="submit" class="bg-pink-900 text-white font-bold px-5 py-1 rounded-full focus:outline-none shadow hover:bg-blue-400 transition-colors">Update</button>
                </div>
              </div>

             
            </div>
        </main>
    </div>
</div>
</x-front-layout>