<x-app-layout>

  <div class="w-full bg-gray-200 min-h-screen py-5">
    <div class="w-[80%] bg-white mx-auto min-h-screen rounded-lg p-10">
      <div class="w-full flex justify-end items-center my-5">
        <button class="w-[8rem] hover:scale-90 transition-all duration-200 h-[3rem] bg-green-400 rounded-lg text-base font-[700] font-montserrat">
          <a href="/classroom/add">Add Classroom</a>
        </button>
      </div>

      <div class="w-full bg-gray-200 rounded-lg p-2 gap-5 flex flex-col justify-center items-center">
        <div class="w-full flex  flex-row justify-start items-center gap-x-10 bg-yellow-400 ">
          <div class="basis-1/12 ">id</div>
          <div class="basis-3/4 ">nama</div>
          <div class="basis-1/3 ">action</div>
        </div>
        @php
          $i = 1;
        @endphp
        @foreach ($classrooms as $classroom)
          <div class="w-full flex  flex-row justify-start items-center gap-x-10">
            <div class="basis-1/12 ">{{ $i }}</div>
            <div class="basis-3/4 ">{{ $classroom->nama }}</div>
            <div class="basis-1/3 flex justify-center items-center">
              <button class="bg-green-400 w-[8rem] h-[2rem] rounded-lg hover:scale-90 transition-all duration-200">
                <a class="w-full flex  justify-center items-center" href="/classroom/detail/{{$classroom->id}}">Detail</a>
              </button>
            </div>    
          </div>
          @php
            $i++;
          @endphp
        @endforeach
      </div>
    </div>   
  </div>        
</x-app-layout>