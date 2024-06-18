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

    <div class="md:container md:mx-auto rounded-md py-14 border px-40 box-border">  

        <form id="contentForm" method="POST">
            <div class="mt-10 grid grid-cols-3 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label for="website" class="block text-lg font-medium leading-6 font-roboto2 text-gray-900">Website</label>
                    <div class="mt-2">
                        <input type="text" name="website" id="website" autocomplete="author_name" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="text-red-500 mt-2" id="websiteError"></div>
                </div>
                                    
                <div class="sm:col-span-2">
                    <label for="author_name" class="block text-lg font-medium leading-6 font-roboto2 text-gray-900">Author</label>
                    <div class="mt-2">
                        <input type="text" name="author_name" id="author_name" autocomplete="author_name" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="text-red-500 mt-2" id="authorError"></div>
                </div>
        
                <div class="sm:col-span-1 mt-1">
                    <div class="mt-6 w-full text-center">                            
                        <button type="button" id="generateBtn" class="bg-indigo-600 px-20 py-2 rounded-md text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Generate</button>
                    </div>      
                </div>       
            </div>
        </form>
    
        <div class="grid grid-cols-2">
            <div class="details1">
                <div id="output" class="mt-6 text-left lowercase block text-[17px]"></div>
                <div id="passwordOutput" class="mt-6 text-left block"></div>
                <div id="themes"  class="mt-6 text-left block lowercase"></div>
                <div id="table_prefix"  class="mt-6 text-left block lowercase"></div>                
            </div>

            <div class="details2">
                <div id="db_name" class="mt-6 text-left lowercase block text-lg"></div>
                <div id="db_username" class="mt-6 text-left block lowercase"></div> 
                <div id="db_password" class="mt-6 text-left block normal-case"></div>               
            </div>
        </div>
    
        <script>      
            function generateRandomPassword() {
                var allowedChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+|;:./?';
                var password = '';
                for (var i = 0; i < 30; i++) {
                    var randomIndex = Math.floor(Math.random() * allowedChars.length);
                    var randomChar = allowedChars.charAt(randomIndex);
                    password += randomChar;
                }
                return password;
            }
        
            document.getElementById("generateBtn").addEventListener("click", function() {
                var adminInput = document.getElementById("website").value.trim();
                var authorInput = document.getElementById("author_name").value.trim();
        
                var adminFirstFive = adminInput.slice(0, 5);
                var authorFirstThree = authorInput.slice(0, 3);
                var authorLastThree = authorInput.slice(-3);          

                // For Themes
                const themesname = adminInput.slice(4, 8);
                const themesauthor3 = authorInput.slice(0, 3);
                const themesauthor4 = authorInput.slice(-3);   

                // For databse name
                const dbName = adminInput.slice(4, 8);
                const dbName1 = authorInput.slice(1, 5);
                const dbName2 = authorInput.slice(-5);   

                // For databse username
                const dbUsername = adminInput.slice(2, 4);
                const dbUsername1 = authorInput.slice(1, 5);
                const dbUsername2 = authorInput.slice(-5);   

                /* Table Prefix */
                const tablePrefix = adminInput.slice(3, 8);
                const tablePrefix1 = authorInput.slice(1, 3);


                // For Password
                var randomNumber1 = Math.floor(Math.random() * 10);
                var randomNumber2 = Math.floor(Math.random() * 10);
                var randomNumber3 = Math.floor(Math.random() * 10);                
        

                var result = adminFirstFive + authorFirstThree + authorLastThree + randomNumber1 + randomNumber2 + randomNumber3;
        
                // For WP LOGIN
                var outputElement = document.getElementById("output");
                outputElement.innerHTML = '<span class="text text-lg font-extrabold block leading-6 font-roboto2 text-gray-900 uppercase">WP LOGIN: </span>' + result;

                // Themes
                const themesResult = themesname + themesauthor3 + randomNumber1 + themesauthor4  + randomNumber2;
                var outputElement = document.getElementById("themes");
                outputElement.innerHTML = '<span class="text text-lg font-extrabold block leading-6 font-roboto2 text-gray-900 uppercase">Themes: </span>' + themesResult;

                // DB name
                const dbNameResult = dbName2 + randomNumber3 + dbName1 + randomNumber1 + dbName  + randomNumber2;
                var outputElement = document.getElementById("db_name");
                outputElement.innerHTML = '<span class="text text-lg font-extrabold block leading-6 font-roboto2 text-gray-900 uppercase">Database Name: </span>' + dbNameResult;

                // DB username
                const dbUsernameResult = dbUsername1 + dbUsername2 + randomNumber1 + randomNumber3 + dbUsername2;
                var outputElement = document.getElementById("db_username");
                outputElement.innerHTML = '<span class="text text-lg font-extrabold block leading-6 font-roboto2 text-gray-900 uppercase">Database username: </span>' + dbUsernameResult;

                /* Table prefix */
                const tablePrefixResult = tablePrefix1 + tablePrefix;
                var outputElement = document.getElementById("table_prefix");
                outputElement.innerHTML = '<span class="text text-lg font-extrabold block leading-6 font-roboto2 text-gray-900 uppercase">Table Prefix: </span>' + tablePrefixResult;

                // For Password
                var password1 = generateRandomPassword();
                var password2 = generateRandomPassword();

                const passwordOutput = document.getElementById("passwordOutput");
                passwordOutput.innerHTML = '<span class="password font-extrabold text-lg block leading-6 font-roboto2 text-gray-900">Password: </span>' + password1;

                // Database Password
                const db_password = document.getElementById("db_password");
                db_password.innerHTML = '<span class="password font-extrabold text-lg block leading-6 font-roboto2 text-gray-900">Password: </span>' + password2;

                
            });
        </script>

        <style>
            
        </style>
        
        
        
                

    </div>



    </div>
</x-app-layout>


