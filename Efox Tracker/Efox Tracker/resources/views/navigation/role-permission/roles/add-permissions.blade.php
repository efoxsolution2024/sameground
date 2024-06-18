<x-app-layout>


    <x-slot name="header">
        
    <div class="hidden sm:flex sm:items-center sm:ms-6 justify-end">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-end px-3 py-2 border border-transparent text-base leading-4 font-medium rounded-md text-gray-900 dark:text-gray-700 bg-white  hover:text-gray-700 dark:hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
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
        <div class="space-y-12">
            <div class="flex justify-between mb-10 items-center">
                <h2 class="text-2xl font-semibold leading-7 text-gray-900 ">Role : {{ $role->name }} </h2>
                <a href=" {{route('role.index')}} " class="bg-indigo-600 px-3 py-2 rounded-md text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
            </div>   
         </div>
    {{-- Form --}}
         <form action=" {{ route('role.give-permissions', $role->id)}} " method="POST">
            @csrf 
            @method('PUT')
            <div class="border-b border-gray-900/10 pb-12">
    
                
       
                       
                        <label for="name" class=" block text-base font-base font-semibold leading-6 text-gray-900 mb-5">Permissions</label>
                      
                    
                        @foreach ($permissions as $permission)                                
                        
                            {{-- <input id="priority" name="priority" type="checkbox"
                            class="h-6 w-6 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                            value="1" {{ $businesses->priority ? 'checked' : '' }}> --}}
                                      
                                <input
                                    type="checkbox"
                                    name="permission[]"    
                                    value=" {{ $permission->name }} "
                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                    class="h-6 w-6 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 mx-3"
                                />
                      
                                {{ $permission->name }}

                            @endforeach
                        </div>

                <div class="w-full block">
                    <div class="mt-6 w-full text-left ">                            
                        <button type="submit" class="bg-indigo-600 px-20 py-2 rounded-md text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </div>   
            </div>
            </form>

      
        
        
        
                





   
</div>
</x-app-layout>


