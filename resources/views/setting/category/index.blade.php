<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="text-right">
                  @can('Category create')
                    <a href="{{route('admin.categories.create')}}" class="bg-pink-900 text-white font-bold px-5 py-1 rounded-full focus:outline-none shadow hover:bg-blue-400 transition-colors"><span class="far fa-user"></span> Add Category</a>
                  @endcan
                </div>

              <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Category Id</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Category Name</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Sub Category</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">Status</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @can('Category access')
                      @foreach($categories as $category)
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $category->id }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $category->icon }} {{ $category->name }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                          <ul>
                            @foreach($category->child as $childCategory)
                            <li>
                              @can('Category edit')
                              <a href="category/edit/{{$childCategory->id}}" class="border border-transparent py-1 px-3 hover:border-blue-400 text-blue-400"><span class="fas fa-edit"></span></a>
                              @endcan
                              @can('Category delete')
                              <form action="{{ route('admin.categories.destroy', $childCategory->id) }}" method="POST" class="inline">
                                @csrf
                                @method('delete')
                                <button class="border border-transparent py-1 px-3 hover:border-pink-400 text-red-400"><span class="far fa-trash"></span></button>
                              </form>
                              @endcan
                              {{ $childCategory->name }}
                             </li>
                            @endforeach  
                            </ul>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">
                          @if($category->active)
                          <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">Publish</span>
                          @else
                          <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">Draft</span>
                          @endif
                      </td>
                        <td class="py-4 px-6 border-b border-grey-light text-right">
                          @can('Category edit')
                          <a href="category/edit/{{$category->id}}" class="border border-transparent py-1 px-3 hover:border-blue-400 text-blue-400"><span class="fas fa-edit"></span></a>
                          @endcan

                          @can('Category delete')
                          <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                              @csrf
                              @method('delete')
                              <button class="border border-transparent py-1 px-3 hover:border-pink-400 text-red-400"><span class="far fa-trash"></span></button>
                          </form>
                          @endcan

                        </td>
                      </tr>
                      @endforeach
                    @endcan

                  </tbody>
                </table>
                @can('FrontUser access')
                <div class="text-right p-4 py-10">
                  {{ $categories->links() }}
                </div>
                @endcan
              </div>
  
            </div>
        </main>
    </div>
</div>
</x-app-layout>
