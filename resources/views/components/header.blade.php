<div class="hidden sm:flex sm:items-center sm:ms-6 justify-end align-center flex">

    <div class="notif pr-6 flex flex-row gap-2 align-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10" style="width: 26px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>


                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10" style="width: 26px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
    </div>

    <x-dropdown align="right" width="48">
        <x-slot name="trigger">


            <button class="inline-flex items-center px-3 py-2 border border-transparent text-base leading-4 font-medium rounded-md text-gray-900 dark:text-gray-700 bg-white  hover:text-gray-700 dark:hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">             

            <div class="flex flex-col pr-2">
                    <div class="text-sm">{{ Auth::user()->name }}</div>
                    <div class="text-sm mt-[5px] text-right font-semibold">          
                        @if (!empty( Auth::user()->getRoleNames()))
                            @foreach ( Auth::user()->getRoleNames() as $rolename)
                                {{ $rolename }}
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="flex items-center mr-2">
                    @if(Auth::user()->picture)
                        <img src="{{ asset(Auth::user()->picture) }}" alt="" class="rounded-full object-cover" style="width: 39px;height: 39px;">
                        @else 
                        <span class="w-8 h-8 rounded-full flex items-center justify-center bg-gray-400 text-white">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    @endif                    
                </div>

       
             

                <!-- <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div> -->
                
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