<x-app-layout>
  <x-slot name="header">
      @include('components.header') 
  </x-slot>   

  <div class="main flex">
    <div class="py-12 bg-indigo-100 mx-10 w-[70.333%] rounded-3xl">
        <div class="max-w-full mx-auto sm:px-6 lg:px-16">
            @include('components.dashboard.banner')
            <hr class="py-5">
        
            <div class="flex justify-between overflow-auto gap-6"> 
               <div class="all_data grid-cols-2 w-[50%] grid gap-6">
                   @include('components.dashboard.main-left-sidebar')  
               </div>   
                   @include('components.dashboard.main-right-sidebar')                
                   @include('components.dashboard.main-profile-sidebar')      
            </div>



           

        </div>
    </div>
  </div>
  
</x-app-layout>    

<!-- {{-- Pass PHP variables to JavaScript  --}} -->

