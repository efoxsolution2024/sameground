<div class="sidebar profile w-[22%] pr-6 fixed right-0">
    <h2 class="text-xl font-semibold text-gray-800">My Profile
      <span class="block text-base font-normal text-gray-600 capitalize">
          @if (!empty( Auth::user()->getRoleNames()))
            @foreach ( Auth::user()->getRoleNames() as $rolename)
                {{ $rolename }}
            @endforeach
          @endif
      </span>
    </h2>

    <div class="profile_image rounded-[50%] border h-32 overflow-hidden w-32 mx-auto my-0 bg-amber-500 outline-t-[unset] outline outline-offset-[5px] outline-3 outline-indigo-600">
          @if(Auth::user()->picture)
          <figure><img src="{{ asset(Auth::user()->picture) }}" alt=""  class="w-full h-32 object-cover"></figure>
              @else 
              <span class="w-8 h-8 rounded-full flex items-center justify-center bg-gray-400 text-white">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
          @endif                       
    </div>

    <div class="profile_name mt-6">
        <h2 class="text-center text-lg font-semibold text-gray-800"> {{ Auth::user()->name }}</h2>
        <h3 class="text-center text-sm text-gray-500">{{ Auth::user()->email }}</h3>
    </div>

    {{-- Task --}}
    <div class="task mt-7">
        <div class="task_con  flex justify-between">
          <h2 class="text-xl font-semibold">Tasks</h2>
           <a href=" {{ route('task.index') }} " class="text-indigo-600">view all</a>             
        </div>
       
        <ul class="mt-4">
          @foreach ($tasks as $task)            
            <li class="flex align-middle">
                <div class="icon w-[45px] h-[45px] mt-3 mr-4 bg-indigo-500 rounded-[50%] box-border p-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M208 64a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM9.8 214.8c5.1-12.2 19.1-18 31.4-12.9L60.7 210l22.9-38.1C99.9 144.6 129.3 128 161 128c51.4 0 97 32.9 113.3 81.7l34.6 103.7 79.3 33.1 34.2-45.6c6.4-8.5 16.6-13.3 27.2-12.8s20.3 6.4 25.8 15.5l96 160c5.9 9.9 6.1 22.2 .4 32.2s-16.3 16.2-27.8 16.2H288c-11.1 0-21.4-5.7-27.2-15.2s-6.4-21.2-1.4-31.1l16-32c5.4-10.8 16.5-17.7 28.6-17.7h32l22.5-30L22.8 246.2c-12.2-5.1-18-19.1-12.9-31.4zm82.8 91.8l112 48c11.8 5 19.4 16.6 19.4 29.4v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V405.1l-60.6-26-37 111c-5.6 16.8-23.7 25.8-40.5 20.2S-3.9 486.6 1.6 469.9l48-144 11-33 32 13.7z" fill="#fff"/></svg>
                </div>

                <a href="">
                  <h3 class="mt-2 font-semibold"> {{ $task->title }} </h3>
                  <p class="text-xs text-gray-500 ">{{ Str::limit($task->description, 40) }}</p>
                </a>
            </li>            
          @endforeach


         </ul>
      </div>
    {{-- End for Task --}}

    <div class="user mt-7">
        <div class="flex justify-between pr-2">
            <h2 class="text-xl font-semibold">User</h2>
            <a href="" class="text-indigo-600">view all</a>         
        </div>
        <ul class="mt-4 bg-indigo-100 p-4 rounded-xl">

              @foreach ($users->take(3) as $user)  
                <li class="flex align-middle">      
                  <div class="icon w-[50px] h-[50px] mt-3 mr-4 bg-indigo-500 rounded-[50%] box-border overflow-hidden">
                    <figure class=""> 
                        <img src="       
                              {{ $user->picture ? $user->picture : asset('images/user/empty_profile.png') }}"
                        alt=""></figure>
                  </div>
                  <a href="">         
                      <h3 class="mt-2 font-semibold"> {{ $user->name }} </h3>  
                      <p class="text-sm text-gray-500">
                          @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $rolename)
                                {{ $rolename }}
                            @endforeach
                          @endif
                      </p>       
                  </a>
                </li>
              @endforeach
              
        </ul>
    </div>
</div>