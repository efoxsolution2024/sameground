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


    <div class="md:container md:mx-auto rounded-md py-14 border px-10 box-border bg-indigo-100">
    <form action=" {{ route('all_business.update', $businesses->id)}} " method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-12">
                    <div class="flex justify-between mb-10 items-center">
                        <h2 class="text-2xl font-semibold leading-7 text-gray-900 ">Update Account</h2>
                        <a href=" {{route('all_business.index')}} " class="bg-indigo-600 px-3 py-2 rounded-md text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                    </div>


                    </div>

                    <div class="border-b border-gray-900/10 pb-12">
   
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                        <label for="website" class=" block text-base font-base font-semibold leading-6 text-gray-900">Website</label>
                        <div class="mt-2">
                            <input type="text" name="website" id="website" autocomplete="given-name" value=" {{ $businesses->website }}" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                        </div>

                        <div class="text-red-500 mt-2">@error('website') {{ $message }} @enderror</div>
                        </div>

                        <div class="sm:col-span-3">
                        <label for="author_name" class=" block text-base font-base font-semibold leading-6 text-gray-900">Author name</label>
                        <div class="mt-2">
                            <input type="text" name="author_name" id="author_name"  value=" {{ $businesses->author_name }}"  class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div class="text-red-500 mt-2">@error('author_name') {{ $message }} @enderror</div>
                        </div>
              
                        <div class="sm:col-span-1 sm:col-start-1">
                        <label for="themes" class=" block text-base font-base font-semibold leading-6 text-gray-900 mb-2">Themes</label>
                        <select id="themes" name="themes" value=" {{ $businesses->themes }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="EFOX Themes" {{ $businesses->themes == 'EFOX Themes' ? 'selected' : ''}}>EFOX Themes</option>
                            <option value="D.I.V.I" {{ $businesses->themes == 'D.I.V.I' ? 'selected' : ''}}>D.I.V.I</option>
                            <option value="Twenty Sixteen Themes" {{ $businesses->themes == 'Twenty Sixteen' ? 'selected' : ''}}>Twenty Sixteen</option>
                            </select>
                        <div class="text-red-500 mt-2">@error('themes') {{ $message }} @enderror</div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="business" class=" block text-base font-base font-semibold leading-6 text-gray-900 mb-2">Business</label>
                            <select id="business" name="business" autocomplete="business" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="Writer's Republic" {{ $businesses->business == "Writer's Republic" ? 'selected' : ''}}>Writer's Republic</option>
                                <option value="Milton & Hugo" {{ $businesses->business == 'Milton & Hugo' ? 'selected' : ''}}>Milton & Hugo</option>
                                <option value="NewLink Media" {{ $businesses->business == 'NewLink Media' ? 'selected' : ''}}>NewLink Media</option>
                                <option value="Writer's Republic (BLP)" {{ $businesses->business == "Writer's Republic (BLP)" ? 'selected' : ''}}>Writer's Republic (BLP)</option>
                                <option value="Milton & Hugo (BLP)" {{ $businesses->business == 'Milton & Hugo (BLP)' ? 'selected' : ''}}>Milton & Hugo (BLP)</option>
                                <option value="NewLink Media (BLP)" {{ $businesses->business == 'NewLink Media' ? 'selected' : ''}}>NewLink Media (BLP)</option>
                                </select>
                            <div class="text-red-500 mt-2">@error('business') {{ $message }} @enderror</div>
                        </div>

                  

                        <div class="">
                        <label for="wp_version" class=" block text-base font-base font-semibold leading-6 text-gray-900 mb-2">Wordpress Version</label>
                        <select id="wp_version" name="wp_version" value="{{ $businesses->wp_version }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="6.5.3" {{ $businesses->wp_version == '6.5.3' ? 'selected' : ''}}>6.5.3</option>
                            <option value="6.5.2" {{ $businesses->wp_version == '6.5.2' ? 'selected' : ''}}>6.5.2</option>
                            <option value="6.5" {{ $businesses->wp_version == '6.5' ? 'selected' : ''}}>6.5</option>
                            <option value="6.5" {{ $businesses->wp_version == '6.4.4' ? 'selected' : ''}}>6.4.4</option>
                            <option value="6.4.3" {{ $businesses->wp_version == '6.4.3' ? 'selected' : ''}}>6.4.3</option>
                            <option value="Older version" {{ $businesses->wp_version == 'Older version' ? 'selected' : ''}}>Older version</option>
                            </select>
                        <div class="text-red-500 mt-2">@error('business') {{ $message }} @enderror</div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="duration" class=" block text-base font-base font-semibold leading-6 text-gray-900 mb-2">Duration</label>
                            <select id="duration" name="duration" autocomplete="duration" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="1 Year" {{ $businesses->duration == '1 Year' ? 'selected' : ''}}>1 Year</option>
                                <option value="2 Years" {{ $businesses->duration == '2 Years' ? 'selected' : ''}}>2 Years</option>
                                <option value="3 Years" {{ $businesses->duration == '3 Years' ? 'selected' : ''}}>3 Years</option>
                                <option value="4 Years" {{ $businesses->duration == '4 Years' ? 'selected' : ''}}>4 Years</option>
                                <option value="5 Years" {{ $businesses->duration == '5 Years' ? 'selected' : ''}}>5 Years</option>
                                <option value="6 Years" {{ $businesses->duration == '6 Years' ? 'selected' : ''}}>6 Years</option>
                                <option value="7 Years" {{ $businesses->duration == '7 Years' ? 'selected' : ''}}>7 Years</option>
                                <option value="8 Years" {{ $businesses->duration == '8 Years' ? 'selected' : ''}}>8 Years</option>
                                <option value="9 Years" {{ $businesses->duration == '9 Years' ? 'selected' : ''}}>9 Years</option>
                                <option value="10 Years" {{ $businesses->duration == '10 Years' ? 'selected' : ''}}>10 Years</option>
                            </select>
                            <div class="text-red-500 mt-2">@error('duration') {{ $message }} @enderror</div>
                        </div>

                        <div class="flex gap-7">
                                <div class="test">
                                    <label for="country" class="text-lg font-medium leading-6 font-roboto2 text-gray-900 mb-2 block">Priority</label>
                                        <input type="hidden" name="priority" value="0">                     
                                        <input id="priority" name="priority" type="checkbox"
                                            class="h-6 w-6 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                            value="1" {{ $businesses->priority ? 'checked' : '' }}>
                                        <div class="text-red-500 mt-2">@error('priority') {{ $message }} @enderror</div>
                                </div>


                                <div class="test">
                                <label for="country" class="text-lg font-medium leading-6 font-roboto2 text-gray-900 mb-2 block">Status</label>
                                    <input type="hidden" name="is_active" value="0">                     
                                    <input id="comments" name="is_active" type="checkbox"
                                        class="h-6 w-6 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                        value="1" {{ $businesses->is_active ? 'checked' : '' }}>
                                    <div class="text-red-500 mt-2">@error('business') {{ $message }} @enderror</div>
                                </div>
                        </div>

                        <div class="sm:col-span-6">
                            <h2 class="text-xl font-semibold leading-7 text-gray-900 pt-5">Website Credentials</h2>
                            <div class="border-b border-gray-900/10 pb-5"></div> 
                        </div>

                        <div class="sm:col-span-6">
                            <h2 class="my-4 text-base font-semibold  py-2 px-5 rounded-3xl bg-indigo-500 text-white">Admin Login Credential</h2>                            
                        </div>

                        <div class="sm:col-span-2">
                            <label for="admin_login_link" class=" block text-base font-base font-semibold leading-6 text-gray-900 px-6">Login link</label>
                            <div class="mt-2 pl-6">
                                <input type="text" name="admin_login_link" id="admin_login_link" value="{{ $businesses->admin_login_link }}" autocomplete="admin_login_link" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                            </div>
                            <div class="text-red-500 mt-2">@error('admin_login_link') {{ $message }} @enderror</div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="admin_username" class=" block text-base font-base font-semibold leading-6 text-gray-900">Username</label>
                            <div class="mt-2 ">
                                <input type="text" name="admin_username" id="admin_username" autocomplete="admin_username"
                                    value="{{ $businesses->admin_username }}" 
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                            </div>
                            <div class="text-red-500 mt-2">@error('admin_username') {{ $message }} @enderror</div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="admin_password" class=" block text-base font-base font-semibold leading-6 text-gray-900">Password</label>
                        <div class="mt-2 pr-6">
                            <input type="text" name="admin_password" id="admin_password" autocomplete="admin_password"
                                value="{{ $businesses->admin_password }}" 
                            class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                        </div>
                        <div class="text-red-500 mt-2">@error('admin_password') {{ $message }} @enderror</div>
                    </div>


                    <div class="sm:col-span-6">
                        <h2 class="my-4 text-base font-semibold  py-2 px-5 rounded-3xl bg-indigo-500 text-white">Author Login Credential</h2>                            
                    </div>

                    <div class="sm:col-span-2">
                        <label for="auth_login_link" class=" block text-base font-base font-semibold leading-6 text-gray-900 px-6">Login link</label>
                        <div class="mt-2 pl-6">
                            <input type="text" name="auth_login_link" id="auth_login_link" autocomplete="auth_login_link"
                            value="{{ $businesses->auth_login_link }}"
                            class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                        </div>
                        <div class="text-red-500 mt-2">@error('auth_login_link') {{ $message }} @enderror</div>
                    </div>

                    <div class="sm:col-span-2">
                            <label for="auth_username" class=" block text-base font-base font-semibold leading-6 text-gray-900">Username</label>
                            <div class="mt-2">
                                <input type="text" name="auth_username" id="auth_username" autocomplete="auth_username"
                                    value="{{ $businesses->auth_username }}"
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                            </div>
                            <div class="text-red-500 mt-2">@error('auth_username') {{ $message }} @enderror</div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="auth_password" class=" block text-base font-base font-semibold leading-6 text-gray-900">Password</label>
                        <div class="mt-2 pr-6">
                            <input type="text" name="auth_password" id="auth_password" autocomplete="auth_password"
                                value="{{ $businesses->auth_password}}"
                            class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                        </div>
                        <div class="text-red-500 mt-2">@error('auth_password') {{ $message }} @enderror</div>
                    </div>


                    {{-- Database --}}
                    <div class="sm:col-span-6">
                        <h2 class="my-4 text-base font-semibold  py-2 px-5 rounded-3xl bg-indigo-500 text-white">Database</h2>                            
                    </div>

                    <div class="sm:col-span-2">
                        <label for="database_name" class=" block text-base font-base font-semibold leading-6 text-gray-900 px-6">Database name</label>
                        <div class="mt-2 pl-6">
                            <input type="text" name="database_name" id="database_name" autocomplete="database_name"
                                value="{{ $businesses->database_name }}"
                            class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                        </div>
                        <div class="text-red-500 mt-2">@error('database_name') {{ $message }} @enderror</div>
                    </div>

                    <div class="sm:col-span-2">
                            <label for="database_username" class=" block text-base font-base font-semibold leading-6 text-gray-900">Database username</label>
                            <div class="mt-2">
                                <input type="text" name="database_username" id="database_username" autocomplete="database_username"
                                    value="{{ $businesses->database_username }}"
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                            </div>
                            <div class="text-red-500 mt-2">@error('database_username') {{ $message }} @enderror</div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="database_password" class=" block text-base font-base font-semibold leading-6 text-gray-900">Database password</label>
                        <div class="mt-2 pr-6">
                            <input type="text" name="database_password" id="database_password" autocomplete="database_password"
                                value="{{ $businesses->database_password }}"
                            class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                        </div>
                        <div class="text-red-500 mt-2">@error('database_password') {{ $message }} @enderror</div>
                    </div>


                        <div class="w-full block">
                        <div class="mt-6 w-full text-center">                            
                            <button type="submit" class="bg-indigo-600 px-20 py-2 rounded-md text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                        </div>                        
                    </div>            
                    </div>             
        </form>


    </div>


</x-app-layout>
