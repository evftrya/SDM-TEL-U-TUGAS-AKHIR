 @props(['route','method'=>'POST','id'=>null,'class'=>null])
 <form action="{{ $route }}" id="{{ $id }}" class="{{$class}} flex flex-col gap-11 w-full max-w-100 mx-auto" method="{{ $method }}">
     @csrf
     {{ $slot }}
     

     <!-- Tombol Submit -->
     <div class="flex justify-end mt-6">
         <button type="submit"
             class="px-6 py-2 bg-black text-white rounded-md font-medium hover:bg-gray-800 transition">
             Simpan Data
         </button>
     </div>
 </form>
