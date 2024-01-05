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
                            <h2>Hi {{ Auth::guard('front')->user()->name }}...! Welcome to your Cash Back Account. </h2>
                        </div>
                        <div class="mb-5">
                            You're logged in! {{session()->get('api_access_token')}}
                        </div>
                    </div>
                    <hr class="mb-5">
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                            <div>
                                <h1 class="text-xl mb-5">Available  Stores</h1>
                            </div>
                            <div>
                                <h1 class="text-right mb-5"><a href="#">See All</a></h1>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 items-center">
                        @foreach ($stores as $store)
                            <div>
                                <div class="p-5 shadow-lg border rounded h-100 mb-1">
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
