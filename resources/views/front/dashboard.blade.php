<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                        <div class="mb-5">
                            <h2 class="text-xl font-bold text-blue-400 mb-2">Hi {{ Auth::guard('front')->user()->name }}  </h2>
                            <p>Welcome to your Cash Back Account. You're logged in!</p>
                        </div>
                        <div class="md:text-right p-3 bg-blue-400 rounded mb-5">
                             API Token: {{session()->get('api_access_token')}}
                        </div>
                    </div>
                    <hr class="mb-5">
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                            <div>
                                <h1 class="text-2xl mb-5">Available  Stores</h1>
                            </div>
                            <div>
                                <h1 class="text-right mb-5"><a href="#">See All</a></h1>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 items-center">
                        @foreach ($stores as $store)
                            <div>
                                <div class="h-24 p-5 shadow-lg border rounded flex items-center mb-1">
                                    <a href="{{ $store->url }}" target="_blank">
                                        <img src="/store/{{ $store->logo }}" alt="{{ $store->name }}">
                                    </a>
                                </diV>
                                <div class="mb-5">
                                    <span class="fas fa-plus"></span> 30% Cash Back 
                                    <a href="{{route('favoriteStore',$store->id)}}" class="border border-transparent py-1 px-3 hover:border-blue-400 text-blue-400">
                                        <span class="fas fa-heart"></span>
                                    </a>
                                </div>  
                            </div>
                        @endforeach 
                        </div>
                    </div>   
                </div>  
            </div>    
        </div>   
    </div>
</x-front-layout>
