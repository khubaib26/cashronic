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
                                <h1 class="text-right mb-5"><a class="hover:text-blue-400" href="#">See All <span class="fas fa-chevron-right"></span></a></h1>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 items-center">     
                        @foreach ($stores as $store)
                            <div>
                                <div class="relative h-24 p-5 shadow-lg border rounded flex items-center mb-1">
                                    <a href="{{ $store->url }}" target="_blank">
                                        <img src="/store/{{ $store->logo }}" alt="{{ $store->name }}">
                                    </a>
                                    <a href="{{route('favoriteStore',$store->id)}}" class="absolute -top-3 -right-2 rounded-full border border-transparent py-1 px-2 {!! $store->like ? 'bg-blue-200 hover:border-blue-400 text-blue-400' : 'bg-red-200 hover:border-red-400 text-red-400' !!}">
                                        {!! $store->like ? '<span class="fas fa-heart"></span>' : '<span class="far fa-heart"></span>' !!}
                                        
                                    </a>
                                </diV>
                                <div class="mb-5">
                                    <span class="fas fa-plus"></span> 30% Cash Back
                                </div>  
                            </div>    
                        @endforeach 
                        </div>
                    </div>
                    <hr class="mb-5">
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                            <div>
                                <h1 class="text-2xl mb-5">Your Favorites Stores</h1>
                            </div>
                            <div>
                                <h1 class="text-right mb-5"><a class="hover:text-blue-400" href="#">See All <span class="fas fa-chevron-right"></span></a></h1>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                        @foreach ($favoriteStore as $fstore)
                            <div>
                                <div class="relative h-24 p-5 shadow-lg border rounded flex items-center mb-1">
                                    <a href="{{ $fstore->url }}" target="_blank">
                                        <img class="w-48" src="/store/{{ $fstore->logo }}" alt="{{ $fstore->name }}">
                                    </a>
                                    <a href="{{route('favoriteStore',$fstore->id)}}" class="absolute -top-3 -right-2 rounded-full border border-transparent py-1 px-2 {!! $fstore->like ? 'bg-blue-200 hover:border-blue-400 text-blue-400' : 'bg-red-200 hover:border-red-400 text-red-400' !!}">
                                        {!! $fstore->like ? '<span class="fas fa-heart"></span>' : '<span class="far fa-heart"></span>' !!}
                                        
                                    </a>
                                    <div class="absolute -bottom-3 right-0 rounded-full bg-blue-200 py-1 px-3 shadow text-pink-900 font-bold">
                                        <span class="fas fa-plus"></span> 30% Cash Back
                                    </div>
                                </diV>
                            </div>
                        @endforeach 
                        </div>
                    </div>

                </div>  
            </div>    
        </div>   
    </div>
</x-front-layout>
