<x-app-layout>
  <div class="w-full bg-gray-400 min-h-screen py-10">
    <div class="w-[50%] mx-auto  bg-white rounded-lg px-10 py-5">
      <form class="w-full" action="/classroom/edit/{{$classroom->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-col justify-center items-start gap-y-5">
          <label for="nama" class="font-[700] text-xl">Nama</label>
          <input type="text" placeholder="nama" name="nama" id="nama" value="{{$classroom->nama}}" class="w-[100%] outline-none" required/>
          <select name="teacher_id" id="teacher_id" class="w-[100%] outline-none">
            <option value="{{$classroom->teacher->id}}">{{$classroom->teacher->nama}}</option>
            @foreach ($teachers as $teacher)
              @if ($teacher->id !== $classroom->teacher->id)
                <option value="{{$teacher->id}}">{{$teacher->nama}}</option>
              @endif
            @endforeach
          </select>
          <div class="flex flex-row justify-center items-center gap-x-5">
            <button type="submit" class="bg-green-400 w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] rounded-lg flex justify-center items-center">
              Save
            </button>
            <a class="bg-yellow-400 w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] rounded-lg flex justify-center items-center" href="/classroom">Cancel</a>
          </div>
        </div>
      </form>
    </div>
</x-app-layout>