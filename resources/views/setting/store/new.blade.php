<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.stores.store')}}" enctype="multipart/form-data">
                  @csrf
                  @method('post')
                <div class="flex flex-col space-y-2">
                  <label for="role_name" class="text-gray-700 select-none font-medium">Store Name</label>
                  <input
                    id="role_name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter Store"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                  />
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="role_name" class="text-gray-700 select-none font-medium">Store URL</label>
                  <input
                    id="url_name"
                    type="url"
                    name="url"
                    value="{{ old('url') }}"
                    placeholder="Enter Store URL"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                  />
                </div>
                <div class="flex flex-col space-y-2">
                  <label for="role_name" class="text-gray-700 select-none font-medium">Store Description</label>
                  <textarea 
                    name="description"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                  ></textarea>
                </div>
                <div class="flex flex-col space-y-2">
                  <label for="role_name" class="text-gray-700 select-none font-medium">Store Logo</label>
                  <input
                    id="url_name"
                    type="file"
                    name="logo"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                  />
                </div>

                <h3 class="text-xl my-4 text-gray-600">Categories</h3>
                <div class="grid grid-cols-3 gap-4">
                  @foreach($categories as $category)
                      <div class="flex flex-col justify-cente">
                          <div class="flex flex-col">
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-900" name="categories[]" value="{{$category->id}}"
                                  ><span class="ml-2 text-gray-700">{{ $category->name }}</span>
                              </label>
                              {{-- <ul>
                                @foreach($category->subCategories as $scategory)
                                <li>
                                  {{$scategory->name}}
                                 </li>
                                @endforeach  
                              </ul> --}}
                          </div>
                      </div>
                  @endforeach
                </div>
                <div class="text-center mt-16">
                  <button type="submit" class="bg-pink-900 text-white font-bold px-5 py-1 rounded-full focus:outline-none shadow hover:bg-blue-400 transition-colors ">Submit</button>
                </div>
              </div>

             
            </div>
        </main>
    </div>
</div>
</x-app-layout>
