<x-app-layout>

  <div class="w-full bg-gray-400 min-h-screen py-10">
    <div class="w-[50%] mx-auto  bg-white rounded-lg px-10 py-5">
      <form class="w-full" action="/classroom/add" method="post">
        @csrf 
        <div class="flex flex-col justify-center items-start gap-y-5">
          <label for="nama" class="font-[700] text-xl">Nama</label>
          <input type="text" placeholder="nama" name="nama" id="nama" class="w-[100%] outline-none" required/>
          <label for="teacher_id" class="font-[700] text-xl">Teacher</label>
          <select name="teacher_id" id="teacher_id" class="w-[100%] outline-none">
            @foreach ($teachers as $teacher)
              <option value="{{$teacher->id}}">{{$teacher->nama}}</option>
            @endforeach
          </select>
          <button type="submit" class="bg-green-400 w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] rounded-lg flex justify-center items-center">
            Add
          </button>
        </div>
      </form>
    </div>
  </div>

</x-app-layout>