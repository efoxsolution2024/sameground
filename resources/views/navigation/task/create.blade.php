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


    <div class="main">
        <div class="md:container md:mx-auto bg-indigo-100 rounded-3xl py-14 border px-10 box-border">
        <form action=" {{ route('task.store')}} " method="POST">
            @csrf
            <div class="space-y-12">
                        <div class="flex justify-between mb-10 items-center">
                            <h2 class="text-2xl font-semibold leading-7 text-gray-900 ">Add Task</h2>
                            <a href=" {{route('task.index')}} " class="bg-indigo-600 px-3 py-2 rounded-md text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
            </div>
    
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="title" class="block text-lg font-medium leading-6 text-gray-900">Title</label>
                                <div class="mt-2">
                                    <input type="text" name="title" id="title" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                <div class="text-red-500 mt-2">@error('title') {{ $message }} @enderror</div>
                            </div>
                            
                            <div class="sm:col-span-5">
                                <label for="description" class="block text-lg font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">                                  
                                    <textarea name="description" id="description" cols="30" rows="10" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                                <div class="text-red-500 mt-2">@error('description') {{ $message }} @enderror</div>
                            </div>                              

    
                  
                            <div class="sm:col-span-1 sm:col-start-1">
                            <label for="status" class="block text-lg font-medium leading-6 text-gray-900 mb-2">Status</label>
                            <select id="status" name="status" autocomplete="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                            <div class="text-red-500 mt-2">@error('status') {{ $message }} @enderror</div>
                            </div>
    
                            <div class="sm:col-span-1">
                                <label for="assign" class="block text-lg font-medium leading-6 text-gray-900 mb-2">Assign to:</label>
                                <select id="assign" name="assign" autocomplete="assign" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option value="User 1">User 1</option>
                                    <option value="User 2">User 2</option>
                                    </select>
                                <div class="text-red-500 mt-2">@error('assign') {{ $message }} @enderror</div>
                            </div>   

                            <div class="sm:col-span-1">
                                <label for="priority" class="block text-lg font-medium leading-6 text-gray-900 mb-2">Priority Levels:</label>
                                <select id="priority" name="priority" autocomplete="priority" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option value="Normal">Normal</option>
                                    <option value="High Prio">High Prio</option>
                                    </select>
                                <div class="text-red-500 mt-2">@error('priority') {{ $message }} @enderror</div>
                            </div>   
          
    
                            <div class="sm:col-span-5">
                            <div class="w-full block">
                            <div class="mt-6 w-full text-left ">                            
                                <button type="submit" class="bg-indigo-600 px-20 py-2 rounded-md text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                            </div>       
                            </div>                 
                        </div>
                </div>             
        </form>
    </div>
    </div>
        



    </div>
</x-app-layout>

