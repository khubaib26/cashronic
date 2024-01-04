<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.stores.update',$store->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                    <div><div class="flex flex-col space-y-2">
                      <label for="role_name" class="text-gray-700 select-none font-medium">Store Name</label>
                      <input
                        id="role_name"
                        type="text"
                        name="name"
                        value="{{ old('name',$store->name) }}"
                        placeholder="Placeholder"
                        class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                      />
                    </div>
                    <div class="flex flex-col space-y-2">
                      <label for="role_name" class="text-gray-700 select-none font-medium">Store URL</label>
                      <input
                        id="url_name"
                        type="url"
                        name="url"
                        value="{{ old('url', $store->url) }}"
                        placeholder="Enter Store URL"
                        class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                      />
                    </div>
                    <div class="flex flex-col space-y-2">
                      <label for="role_name" class="text-gray-700 select-none font-medium">Store Description</label>
                      <textarea 
                        name="description"
                        class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                      >{{ $store->description }}</textarea>
                    </div>
                  </div>
                  <div>
                    <div class="flex text-gray-500 mt-5 mx-auto order-first md:order-last">
                      <div class="bg-white rounded-lg mx-auto">
                        <div class="" x-data="imageData()">
                          <div x-show="previewUrl == '' && imgurl == ''">
                            <p class="text-center uppercase text-bold">
                              <label for="thumbnailprev" class="cursor-pointer">
                                Upload a file
                              </label>
                              <input type="file" name="logo" id="thumbnailprev" class="hidden thumbnailprev" @change="updatePreview()">
                            </p>
                          </div>
                          <div x-show="previewUrl !== ''" class="relative xw-40 xh-40">
                            <img :src="previewUrl" alt="" class="shadow-lg xrounded-full max-w-full h-auto align-middle border-4 h-full w-full object-cover">
                            <div class="xml-5 absolute top-0 right-0">
                              <button type="button" class="" @click="clearPreview()"><span class="fas fa-edit"></span></button>
                            </div>
                          </div>
                          <div x-show="imgurl !== ''" class="relative xw-40 xh-40">
                            <img :src="imgurl" alt="" class="shadow-lg xrounded-full max-w-full h-auto align-middle border-4 h-full w-full object-cover">
                            <div class="xml-5 absolute top-0 right-0">
                              <button type="button" class="" @click="clearPreview()"><span class="fas fa-edit"></span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                
                

                <h3 class="text-xl my-4 text-gray-600">Categories</h3>
                <div class="grid grid-cols-3 gap-4">
                  @foreach($categories as $category)
                      <div class="flex flex-col justify-cente">
                          <div class="flex flex-col">
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-900" name="categories[]" value=" {{$category->id}}"  @if(count($store->categories->where('id',$category->id)))
                                      checked 
                                    @endif
                                  ><span class="ml-2 text-gray-700">{{ $category->name }}</span>
                              </label>
                              
                          </div>
                      </div>
                  @endforeach
                </div>
                <div class="text-center mt-16">
                  <button type="submit" class="bg-pink-900 text-white font-bold px-5 py-1 rounded-full focus:outline-none shadow hover:bg-blue-400 transition-colors">Update</button>
                </div>
              </div>

             
            </div>
        </main>
    </div>
</div>
<script>
  function imageData() {
      var files = document.getElementById("thumbnailprev").files;
      if(files.length == 0){
          var url = '/store/'+{!! json_encode($store->logo) !!};
      }else{
          url = '';
      }
    return {
      previewUrl: "",
      imgurl: url,
      updatePreview() {
        var reader, files = document.getElementById("thumbnailprev").files;
        reader = new FileReader();
        reader.onload = e => {
          this.previewUrl = e.target.result;
        };
        reader.readAsDataURL(files[0]);
      },
      clearPreview() {
        document.getElementById("thumbnailprev").value = null;
        this.previewUrl = "";
        this.imgurl     = "";
      }
    };
  }

</script>


</x-app-layout>
