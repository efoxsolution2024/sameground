<x-app-layout>


    <x-slot name="header">
        
    <div class="hidden sm:flex sm:items-center sm:ms-6 justify-end">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-end px-3 py-2 border border-transparent text-base leading-4 font-medium rounded-md text-gray-900 dark:text-gray-700 bg-white  hover:text-gray-700 dark:hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            

                            <div class="flex items-center mr-2">
                                @if(Auth::user()->picture)
                                    <img src="{{ asset(Auth::user()->picture) }}" alt="" class="w-8 h-8 rounded-full object-cover">
                                    @else 
                                    <span class="w-8 h-8 rounded-full flex items-center justify-center bg-gray-400 text-white">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                @endif 
                               
                            </div>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

    </x-slot>  

    <div class="md:container md:mx-auto bg-indigo-50 rounded-3xl py-14 border px-10 box-border shadow mb-16 relative "> 
        <div class="flex justify-between mb-10 items-center">
            <h2 class="text-2xl font-semibold leading-7 text-gray-900 ">Permission</h2>
            <a href=" {{route('permission.create')}} " class="bg-indigo-600 px-3 py-2 rounded-xl text-white">Create Permission</a>
        </div>

        <table class="w-full text-base text-left rtl:text-right mb-14">
            <thead class="">
                <tr class="font-normal border-b-2 border-gray-300">
                    <th scope="col" class="py-3 text-base text-gray-900 font-semibold pl-4">
                        Website
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold text-base text-gray-900 w-30">
                        Action
                    </th>
                </tr>
            </thead>     
           
            <tbody>
                @foreach ($permissions as $permission)       
                    <tr class="border-b-1 border-gray-300 text-[15px] ">  
                        <td class="px-6 py-4"> {{ $permission->name }} </td> 
                        <td  class="py-4 w-[1%]"><a href="{{ route('permission.edit', $permission->id)  }}" class="pl-6 pr-0 text-indigo-600 font-medium">Edit</a></td>
                        <td class="py-4">
                            <form action="{{ route('permission.delete', $permission->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-6 text-red-600 font-medium">
                                    Delete
                                </button>
                            </form>
                        </td>
                       
    
                    </tr>
                @endforeach                     
            </tbody>
           

        </table>

       
        
        
        
                

    </div>

    


    </div>
</x-app-layout>

<style>
    tr:nth-child(even) { background-color: #E4EAFF; }
</style>
