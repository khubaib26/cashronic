<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="text-right">
                  @can('FrontUser create')
                    <a href="{{route('admin.front-users.create')}}" class="bg-pink-900 text-white font-bold px-5 py-1 rounded-full focus:outline-none shadow hover:bg-blue-400 transition-colors"><span class="far fa-user"></span> Add User</a>
                  @endcan
                </div>

              <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">User Id</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">User Name</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Email</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @can('FrontUser access')
                      @foreach($users as $user)
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $user->id }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td>
                        <td class="py-4 px-6 border-b border-grey-light text-right">
                          {{-- User Browser History --}}
                          <a title="User Browser History" href="{{route('admin.userBrowserHistory',$user->id)}}" class="border border-transparent py-1 px-3 hover:border-green-400 text-green-400"><span class="fas fa-history"></span></a>

                          @can('FrontUser edit')
                          <a title="User Edit" href="{{route('admin.front-users.edit',$user->id)}}" class="border border-transparent py-1 px-3 hover:border-blue-400 text-blue-400"><span class="fas fa-edit"></span></a>
                          @endcan
                          @can('FrontUser delete')
                          <form action="{{ route('admin.front-users.destroy', $user->id) }}" method="POST" class="inline">
                              @csrf
                              @method('delete')
                              <button title="User Delete" class="border border-transparent py-1 px-3 hover:border-pink-400 text-red-400"><span class="far fa-trash"></span></button>
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
                  {{ $users->links() }}
                </div>
                @endcan
              </div>
  
            </div>
        </main>
    </div>
</div>
</x-app-layout>
