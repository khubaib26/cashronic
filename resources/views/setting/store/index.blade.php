<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="text-right">
                  @can('Store create')
                    <a href="{{route('admin.stores.create')}}" class="bg-pink-900 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-400 rounded-full transition-colors">New Store</a>
                </div>
                @endcan

              <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">&nbsp;</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">Store Name</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Store URL</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Categories</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-2/12">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @can('Store access')
                      @foreach($stores as $store)
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">
                          @if($store->logo != '')
                          <img src="/store/{{ $store->logo }}">
                          @else
                          <img src="{{ asset("images/logo.png") }}">
                          @endif
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $store->name }}</td>
                        <td class="py-4 px-6 border-b border-grey-light"><a href="{{ $store->url }}" target="_blank">{{ $store->url }}</a></td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            @foreach($store->categories as $category)
                              <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light text-right">

                          @can('Store edit')
                          <a href="{{route('admin.stores.edit',$store->id)}}" class="border border-transparent py-1 px-3 hover:border-blue-400 text-blue-400"><span class="fas fa-edit"></span></a>
                          @endcan

                          @can('Store delete')
                          <form action="{{ route('admin.stores.destroy', $store->id) }}" method="POST" class="inline">
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
              </div>
  
            </div>
        </main>
    </div>
</div>
</x-app-layout>
