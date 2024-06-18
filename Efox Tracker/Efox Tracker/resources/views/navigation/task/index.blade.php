<x-app-layout>
    <x-slot name="header">
    <div class="hidden sm:flex sm:items-center sm:ms-6 justify-end">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center justify-between gap-2 px-3 py-2 border border-transparent text-base leading-4 font-medium rounded-md text-gray-900 dark:text-gray-700 bg-white  hover:text-gray-700 dark:hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
   
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

    <div class="md:container md:mx-auto bg-indigo-50 rounded-3xl py-14 border px-10 box-border shadow mb-16 relative"> 
            <div class="flex justify-between mb-10 items-center">
                <h2 class="text-2xl font-semibold leading-7 text-gray-900 ">Task</h2>
                <a href=" {{route('task.create')}} " class="bg-indigo-600 px-3 py-2 rounded-md text-white">Add Task</a>
            </div>

        
        
        <table class="w-full text-base text-left rtl:text-right mb-14">
            <thead class="">
                <tr class="font-normal border-b-2 border-gray-300">
                    <th scope="col" class="py-3 pl-4 text-base text-gray-900 font-semibold">
                        Date
                    </th>
                    <th scope="col" class="py-3 text-base text-gray-900 font-semibold">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold text-base text-gray-900">
                        Descripton 
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold text-base text-gray-900">
                        Status
                    </th>              
                </tr>
            </thead>          
            <tbody>
                @foreach ($tasks as $task)
                <tr class="border-b-1 border-gray-300">
                    <td class="px-0 pl-4 py-4 text-[15px] font-medium text-gray-900"> {{ date('F j, Y', strtotime($task->created_at)) }}</td>
                    <td class="px-0 py-4 text-[14px] font-normal text-gray-900">{{ $task->title }}</td>
                    <td class="pl-6 py-4 text-[14px] font-normal text-gray-900 w-[60%] pr-[20px]">{{ $task->description }}</td>
                    <td class="pl-6 py-4 text-[15px] font-light text-gray-900 text-white text-[400]">
                        <form id="task-form-{{ $task->id }}" action="{{ route('task.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select id="status-{{ $task->id }}" name="status" class="rounded-full block w-[auto] border-0 py-1.5 text-shadow-sm  text-[400] ring-1 text-white ring-inset font-semibold ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 {{ $task->status == 'Pending' ? 'bg-yellow-300' : 'bg-green-600' }}" onchange="updateTask({{ $task->id }})">
                                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option class="text-sm" value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                </tr>
       
                @endforeach
            </tbody>
        </table>


        <div class="history mb-5">History</div>
        @foreach ($tasks as $task)          
            <p class="text-sm mb-4">{{ $task->formatted_date }} {{ $task->user->name }} named <span class="text-blue-600">{{ $task->title }}</span> added task</small></p>
            <ul id="history-{{ $task->id }}">
                @foreach ($task->histories as $history)
                <li>{{ $history->formatted_date_time }} |{{ $history->user->name }} changed status to {{ $history->status }}</li>
                @endforeach
            </ul>
        @endforeach


        <script>
            function updateTask(taskId) {
                let form = document.getElementById(`task-form-${taskId}`);
                let formData = new FormData(form);
                let selectElement = document.getElementById(`status-${taskId}`);
                
                // Update the background color based on the selected status
                function updateBackgroundColor() {
                    let selectedValue = selectElement.value;
                    if (selectedValue === 'Pending') {
                        selectElement.classList.remove('bg-green-600, text-white');
                        selectElement.classList.add('bg-yellow-300');
                    } else if (selectedValue === 'Completed') {
                        selectElement.classList.remove('bg-yellow-300 ');
                        selectElement.classList.add('bg-green-600 text-white');
                    }
                }
        
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Task updated successfully');
                        updateBackgroundColor();
        
                        // Update the history list
                        let historyList = document.getElementById(`history-${taskId}`);
                        let newHistoryItem = document.createElement('li');
                        newHistoryItem.innerText = `${data.history.formatted_date_time} | user named ${data.history.user_name} ${data.history.status == 'Completed' ? 'completed' : 'changed to pending'} the task ${data.history.task_title}`;
                        historyList.appendChild(newHistoryItem);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        
                updateBackgroundColor();
            }
        </script>


    
        </div>          

</x-app-layout>

