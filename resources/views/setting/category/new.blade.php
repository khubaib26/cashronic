<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.categories.store')}}">
                  @csrf
                  @method('post')
                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-gray-700 select-none font-medium">Category Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                      placeholder="Enter name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                <div class="flex flex-col space-y-2">
                  <label for="name" class="text-gray-700 select-none font-medium">Parent Category</label>
                  <select name="parent_category" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                      <option value="">None</option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
                </div>
                
                <div class="text-center mt-16 mb-16">
                  <button type="submit" class="bg-pink-900 text-white font-bold px-5 py-1 rounded-full focus:outline-none shadow hover:bg-blue-400 transition-colors">Submit</button>
                </div>
              </div>

             
            </div>
        </main>
    </div>
</div>
</x-app-layout>
