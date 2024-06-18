<nav x-data="{ open: false }" class="bg-white float-left border-b border-gray-100  md:w-64">
    <!-- Primary Navigation Menu -->
    <div class="flex-col md:w-64 md:flex md:flex-row md:min-h-screen fixed z-10">
        <div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-gray-800 md:w-64 dark-mode:text-gray-200 dark-mode:bg-gray-800" x-data="{ open: false }">
            <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                <a href=" {{route('dashboard')}}" class="text-xl font-semibold tracking-widest text-white uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline text-center mb-10">WP Account Tracker</a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>


                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard
                    </x-nav-link>  

                    <x-nav-link :href="route('all_business.index')" :active="request()->routeIs('all_business.index')">All Account's
                    </x-nav-link>     
                    
                    
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="block px-4 py-2 mt-2 text-base font-semibold text-gray-900  rounded-lg  dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline mx-3">
                        <span>Task</span>
                           
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="relative right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">

                            <div class="px-2 py-2 rounded-md shadow dark-mode:bg-gray-700 mx-3">
                              
                                <x-nav-link :href="route('task.index')" :active="request()->routeIs('task.index')">
                                    <span class="text-white">All Task</span>
                                </x-nav-link>  

                                <x-nav-link :href="route('task.index')" :active="request()->routeIs('task.index')">
                                    <span class="text-white">Pending</span>
                                </x-nav-link>  
                                <x-nav-link :href="route('task.index')" :active="request()->routeIs('task.index')">
                                    <span class="text-white">Completed</span>
                                </x-nav-link>  
                            </div>
                        </div>
                    </div>

                    <x-nav-link :href="route('chatify')" target="_blank" :active="request()->routeIs('chatify')">Message </x-nav-link> 


                    
                    <x-nav-link :href="route('sop_generator')" :active="request()->routeIs('sop_generator')">
                        SOP Generator
                    </x-nav-link>                 
                    @role('admin')
                    <x-nav-link :href="route('permission.index')" :active="request()->routeIs('permission.index')">
                        Permission
                    </x-nav-link>     
                    <x-nav-link :href="route('role.index')" :active="request()->routeIs('role.index')">
                        Role
                    </x-nav-link>    
                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                        User
                    </x-nav-link>    
                    @endrole

                    
                </nav>
        </div>
    </div>
</nav>
