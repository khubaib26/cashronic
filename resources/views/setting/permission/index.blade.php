<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="text-right">
                  @can('Permission create')
                    <a href="{{route('admin.permissions.create')}}" class="bg-pink-900 text-white font-bold px-5 py-1 rounded-full focus:outline-none shadow hover:bg-blue-400 transition-colors">New Permission</a>
                  @endcan
                </div>

              <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Permission Name</th>
                      
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    @can('Permission access')
                      @foreach($permissions as $permission)
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $permission->name }}</td>
                        <td class="py-4 px-6 border-b border-grey-light text-right">
                          @can('Permission edit')
                          <a href="{{route('admin.permissions.edit',$permission->id)}}" class="border border-transparent py-1 px-3 hover:border-blue-400 text-blue-400"><span class="fas fa-edit"></span></a>
                          @endcan

                          @can('Permission delete')
                          <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="inline">
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
