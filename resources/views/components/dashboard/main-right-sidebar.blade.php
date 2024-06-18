<div class=" bg-white rounded-lg shadow  p-4 md:p-6 w-[70%]">

    <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-lg bg-amber-100 flex items-center justify-center me-3">
              <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" fill="#eaa051"/>
              </svg>
            </div>

            <div>
                <h5 class="leading-none text-2xl font-bold text-indigo-600 pb-1"> 51</h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Leads generated per week</p>
            </div>
        </div>
       
        <div>
            <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
              <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
              </svg>
              42.5%
            </span>
        </div>
    </div>
  
    <div class="grid grid-cols-2">
          <dl class="flex items-center">
              <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">New Website:</dt>
              <dd class=" text-sm text-indigo-600 font-semibold">$3,232</dd>
          </dl>
          <dl class="flex items-center justify-end">
              <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Expired Domain</dt>
              <dd class=" text-sm text-indigo-600 font-semibold">{{ $expiredAccount }}</dd>
          </dl>
    </div>
  
    <div id="column-chart"></div>
      <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
        <div class="flex justify-between items-center pt-5">
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="block px-4 py-2 mt-2 text-base font-semibold text-white rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline mx-3">
            <span>Filter</span>
            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="relative right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
            <div class="px-2 py-2 rounded-md shadow dark-mode:bg-gray-700 mx-3">
                <ul>
                    <li><a href="#" id="thisWeek" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">This Week</a></li>
                    <li><a href="#" id="last7Days" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Last 7 Days</a></li>
                </ul>
            </div>
        </div>
    </div>
          <a
            href="#"
            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
            Leads Report
            <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
          </a>
        </div>
      </div>
  </div>
  </div>
  
  <div class="mt-20">
    
          

            
      </div>
    </div>
</div>
<script>
  const expiredData = @json($expiredData);
  const expiredData7 = @json($expiredData7);
  const newData = @json($newData);
  const newData7 = @json($newData7);
 console.log(newData7, expiredData7);
</script>

