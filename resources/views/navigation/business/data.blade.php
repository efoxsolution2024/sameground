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
    
    
    
        <div class="md:container md:mx-auto rounded-3xl bg-indigo-50 py-14 border px-10 box-border mt-10 mb-16 shadow">
            <div class="flex justify-between mb-10 items-center">
                <h2 class="text-2xl font-semibold leading-7 text-gray-900 mb-10">
                    @if($business->priority)
                        <span class="text-red-500 font-bold">!</span>
                    @endif
                    {{ $business->author_name }}
                </h2>
                
                
               <a href=" {{route('all_business.index')}} " class="bg-indigo-600 px-3 py-2 rounded-md text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
            </div>    
           

            <div class="all_data">

                <div class="data-1 grid grid-cols-5 gap-10">
                    <section class="info1">
                        <h3 class="font-semibold text-base text-gray-900 block mb-2 ">Website</h3>
                         <a href="https:{{ $business->website }}" target="_blank" class="hover:text-indigo-600">{{ $business->website }} </a>
                    </section> 

                    <section class="info2">
                        <h3 class="font-semibold text-base text-gray-900 block mb-2">Business</h3>
                        <span class="text-[15px]">{{ $business->business }} </span>
                    </section>

                    <section class="info3">
                        <h3 class="font-semibold text-base text-gray-900 block mb-2">Wordpress Version</h3>
                        <span class="text-[15px]">{{ $business->wp_version }}</span>
                    </section>  

                    <section class="info4">
                        <h3 class="font-semibold text-base text-gray-900 block mb-2">Themes</h3>
                        <span class="text-[15px]">{{ $business->themes }}</span>
                    </section> 
                    
                    
                    <section class="info5">
                        <h3 class="font-semibold text-base text-gray-900 block mb-2">Updated at</h3>
                        <span class="text-[15px]">{{ date('F j, Y \|\ g:i a', $business->updated_at->timestamp) }}</span>
                    </section>  
                   
       

                </div>

                <div class="data-1 grid grid-cols-5 gap-10 mt-10">  

                    <section class="info5 mt-4">
                        <h3 class="font-semibold text-base text-gray-900 block mb-2">Date Created</h3>                       
                        <span class="text-[15px]"> {{ date('F j, Y', strtotime($business->created_at)) }}</span>
                    </section>  


                    <section class="info6  mt-4">
                        <h3 class="font-semibold text-base text-gray-900 block mb-2">Duration</h3>
                        <span class="text-[15px]">  {{ $business->duration }}               </span>     
                    </section>  

                    <section class="info7  mt-4">
                        <h3 class="font-semibold text-base text-gray-900 block mb-2">Expiration Date</h3>                      
                        <span class="text-[15px]"> {{ date('F j, Y', strtotime($business->expired_date)) }}</span>
                    </section>

                    <section class="info8 mt-4">
                        <h3 class="font-semibold text-base text-gray-900 block mb-2">Status</h3>
                    @if($business->is_active)
                        <svg class="w-6 h-6 text-gray-800 dark:text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/></svg> 
                    @else
                        <svg class="w-6 h-6 text-gray-800 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                    @endif
                    </section>  
                </div>

                <div class="border-b border-gray-900/10 pt-16"></div> 
                <h2 class="my-8  text-base font-semibold  py-2 px-5 rounded-3xl bg-indigo-500 text-white">Admin Credential's</h2>
                <div class="data-2 grid grid-cols-3 gap-5 mt-auto pl-6">                  
                    <section class="info6">
                        <h3 class="block mb-2 font-semibold text-base text-gray-900">Link</h3>
                        <a href="https:{{ $business->admin_login_link }}" target="_blank" class="text-[15px]">{{ $business->admin_login_link }} </a>
                    </section>

                    <section class="info7">
                        <h3 class="block mb-2 font-semibold text-base text-gray-900">Username</h3>                        
                        <h2 class="text-[15px]">{{ $business->admin_username }} </h2>
                    </section>

                    <section class="info8">
                    
                        <h3 class="block mb-2 font-semibold text-base text-gray-900">Password</h3> 
                        <div class="flex">
                            <input id="passwordField" type="password" value="{{ $business->admin_password }}" readonly class="text-[15px] outline-none border-none bg-indigo-50 active:bg-[transparent] focus:ring-0 w-80">
                            <button id="togglePassword" onclick="togglePasswordVisibility()">
                                <img id="eyeIcon" src="{{ asset('images/close-eye.png') }}" alt="Eye Icon">
                            </button>
                        </div>
                            
                            <script>
                                function togglePasswordVisibility() {
                                    const passwordField = document.getElementById("passwordField");
                                    const eyeIcon = document.getElementById("eyeIcon");
                            
                                    if (passwordField.type === "password") {
                                        passwordField.type = "text";
                                        eyeIcon.src = "{{ asset('images/eye.png') }}";
                                    } else {
                                        passwordField.type = "password";
                                        eyeIcon.src = "{{ asset('images/close-eye.png') }}";
                                    }
                                }
                            </script>
                            


                    </section>
                </div>
                    
                <h2 class="my-8  text-base font-semibold  py-2 px-5 rounded-3xl bg-indigo-500 text-white">Author Credential's</h2>
                <div class="data-3 grid grid-cols-3 gap-5 mt-12 pl-6">

                    <section class="info4">
                        <h3 class="block mb-2 font-semibold text-base text-gray-900">Link</h3>
                        <a href="https:{{ $business->auth_login_link }}" target="_blank" class="text-[15px]">{{ $business->auth_login_link }} </a>
                    </section>

                    <section class="info5">
                        <h3 class="block mb-2 font-semibold text-base text-gray-900">Username</h3>                        
                        <h2 class="text-[15px]">{{ $business->auth_username }} </h2>
                    </section>

                    <section class="info5">
                        <h3 class="block mb-2 font-semibold text-base text-gray-900">Password</h3>                        
                        <div class="flex">
                            <input id="passwordField1" type="password" value="{{ $business->auth_password }}" readonly class="bg-indigo-50  text-[15px] outline-none border-none focus:ring-0 w-80">
                            <button id="togglePassword1" onclick="togglePasswordVisibility1()">
                                <img id="eyeIcon1" src="{{ asset('images/close-eye.png') }}" alt="Eye Icon">
                            </button>
                        </div>
                            
                            <script>
                                function togglePasswordVisibility1() {
                                    const passwordField = document.getElementById("passwordField1");
                                    const eyeIcon1 = document.getElementById("eyeIcon1");
                            
                                    if (passwordField.type === "password") {
                                        passwordField.type = "text";
                                        eyeIcon1.src = "{{ asset('images/eye.png') }}";
                                    } else {
                                        passwordField.type = "password";
                                        eyeIcon1.src = "{{ asset('images/close-eye.png') }}";
                                    }
                                }
                            </script>
                    </section>

                 </div>          

    
                 <h2 class="my-8  text-base font-semibold  py-2 px-5 rounded-3xl bg-indigo-500 text-white">Database Credential's</h2>
                    <div class="data-4 grid grid-cols-3 gap-5 mt-8 pl-6">

                        <section class="info4">
                            <h3 class="block mb-2 font-semibold text-base text-gray-900">Database name</h3>
                            <h2 class="text-[15px]">{{ $business->database_name }} </h2>
                        </section>

                        <section class="info5">
                            <h3 class="block mb-2 font-semibold text-base text-gray-900">Database username</h3>                        
                            <h2 class="text-[15px]">{{ $business->database_username }} </h2>
                        </section>

                        <section class="info5">
                            <h3 class="block mb-2 font-semibold text-base text-gray-900">Database Password</h3>                        
                            <div class="flex">
                                <input id="passwordField2" type="password" value="{{ $business->database_password }}" readonly class="bg-indigo-50  outline-none border-none text-[15px] focus:ring-0 w-80">
                                <button id="togglePassword2" onclick="togglePasswordVisibility2()">
                                    <img id="eyeIcon2" src="{{ asset('images/close-eye.png') }}" alt="Eye Icon">
                                </button>
                            </div>                               

                            <script>
                                function togglePasswordVisibility2() {
                                    const [passwordField, eyeIcon2] = [document.getElementById("passwordField2"), document.getElementById("eyeIcon2")];
                                    passwordField.type = passwordField.type === "password" ? "text" : "password";
                                    eyeIcon2.src = passwordField.type === "password" ? "{{ asset('images/eye.png') }}" : "{{ asset('images/close-eye.png') }}";
                                }
                            </script>

                        </section>

                    </div>                   
                </ul>
    </div>

    <style>
        #passwordField:active, #passwordField:focus { background: none; -webkit-appearance: none; }


    </style>

</x-app-layout>