<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                {{-- <div class="text-right">
                  @can('FrontUser create')
                    <a href="{{route('admin.front-users.create')}}" class="bg-pink-900 text-white font-bold px-5 py-1 rounded-full focus:outline-none shadow hover:bg-blue-400 transition-colors"><span class="far fa-user"></span> Add User</a>
                  @endcan
                </div> --}}

              <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Id</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Link</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ASIN</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @can('FrontUser access')
                      @foreach($histories as $history)
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $history->id }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                          @if(empty($history->product_detail))
                            <a href="{{ $history->link }}" target="_blank">View Product</a>    
                          @else
                          @php $productData = json_decode($history->product_detail); @endphp
                            <a class="flex items-center" href="{{ $history->link }}" title="{{ $productData[0]->product->title }}" target="_blank">
                                <img class="object-cover w-16 h-16 p-1 border shadow" src="{{ $productData[0]->product->main_image->link }}" alt="{{ $productData[0]->product->title }}">
                                <span class="p-1">{{ $productData[0]->product->title }}...</span>
                            </a>
                          @endif
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $history->asin }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $history->created_at }}</td>
                      </tr>
                      @endforeach
                    @endcan

                  </tbody>
                </table>
                @can('FrontUser access')
                <div class="text-right p-4 py-10">
                  {{ $histories->links() }}
                </div>
                @endcan
              </div>
  
            </div>
        </main>
    </div>
</div>
<script>
  
// const options = {
//   method: 'GET',
//   headers: {
//     accept: 'application/json',
//     'X-api-key': '3fec8651-4434-44cb-bfad-40d58cfb4229'
//   }
// };

// fetch('https://api.listingleopard.com/single/product-page?asin=B08866RDYK&domain=amazon.com', options)
//   .then(response => response.json())
//   .then(response => console.log(response))
//   .catch(err => console.error(err));

</script>
</x-app-layout>
