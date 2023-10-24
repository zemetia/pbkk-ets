<x-app-layout>
  <div class="w-full bg-gray-400 min-h-screen py-10">
    <div class="w-[50%] mx-auto  bg-white rounded-lg px-10 py-5 flex flex-col justify-center items-center gap-5">
      <h2 class="text-xl font-[700] text-red-400">Are you sure delete this data: {{ $teacher->nama }}</h2>
      <form class="flex flex-row justify-center items-center gap-x-5" action="/teacher/delete/{{ $teacher->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-400 w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] rounded-lg flex justify-center items-center">
          Delete
        </button>
        <a class="bg-green-400 w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] rounded-lg flex justify-center items-center" href="/teacher">Cancel</a>
      </form>
    </div>
  </div>
</x-app-layout>
