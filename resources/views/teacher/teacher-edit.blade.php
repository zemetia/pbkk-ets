<x-app-layout>
  <div class="w-full bg-gray-400 min-h-screen py-10">
    <div class="w-[50%] mx-auto  bg-white rounded-lg px-10 py-5">
      <form class="w-full" action="/teacher/edit/{{$teacher->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex flex-col justify-center items-start gap-y-5">
          <label for="nama" class="font-[700] text-xl">Nama</label>
          <input type="text" placeholder="nama" name="nama" id="nama" value="{{$teacher->nama}}" class="w-[100%] outline-none" required/>
          {{-- input type file for image --}}
          <label for="image" class="font-[700] text-xl">Profile</label>
          <input type="file" placeholder="image" name="image" id="image" class="w-[100%] outline-none" required/>
          <div class="flex flex-row justify-center items-center gap-x-5">
            <button type="submit" class="bg-green-400 w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] rounded-lg flex justify-center items-center">
              Save
            </button>
            <a class="bg-yellow-400 w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] rounded-lg flex justify-center items-center" href="/teacher">Cancel</a>
          </div>
        </div>
      </form>
    </div>
</x-app-layout>