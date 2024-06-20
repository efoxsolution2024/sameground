<x-app-layout>
  <x-slot name="header">
      @include('components.header') 
  </x-slot>   
  <div class="py-12 bg-indigo-100 mx-10 w-[70.333%] rounded-3xl">
    <div class="max-w-full mx-auto sm:px-6 lg:px-16">
      <div class="flex overflow-auto gap-6 space-between box-border"> 

                  <div class="max-w-sm w-[50%] bg-white rounded-lg shadow p-4 md:p-6 w-2/4 box-border">
                    <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-5">
                      <dl class="pb-2">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">All Account</dt>
                        <dd id="total" class="leading-none text-2xl font-bold text-indigo-600 pb-2">{{ $totalAll }}</dd>
                      </dl>
                      <div>
                        <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                          <svg class="w-2.5 h-2.5 me-1.5 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                          </svg>
                          Profit rate 23.5%
                        </span>
                      </div>
                    </div>

                    <div class="grid grid-cols-2 py-3">
                      <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">New Account</dt>
                        <dd  id="new-account"class="leading-none text-xl font-bold text-green-500 dark:text-green-400">{{$firstquarterNew}}</dd>
                      </dl>
                      <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Expired Account</dt>
                        <dd id="expired-account" class="leading-none text-xl font-bold text-red-600 dark:text-red-500">{{$firstquarterExpired}}</dd>
                      </dl>
                    </div>

                    <div id="bar-chart"></div>
                      <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                        <div class="flex justify-between items-center pt-5">
                          <!-- Button -->
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
                                          <li><a href="#" id="6months" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">6 months</a></li>
                                          <li><a href="#" id="next6months" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Next 6 Months</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <a
                            href="#"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                            Revenue Report
                            <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                          </a>
                        </div>
                      </div>
                  </div>



      <!-- Data Name --> 
      <div class="data w-2/4 box-border">
        <table class="text-base text-left rtl:text-right mb-14 ">
    
              <thead class="">
                  <tr class="font-normal border-b-2 border-gray-300">                  
                      <th scope="col" class="pl-4 py-3 font-semibold text-base text-gray-900"> Website </th>
                      <th scope="col" class="px-[56px] py-3 font-semibold text-base text-gray-900" style="padding: 0 0 0 230px;;"> Expired Date </th>
                  </tr>
              </thead>
              <tbody> @foreach ($expiredAccountNames as $expiredAccountName)
                  <tr class="border-b-1 border-gray-300 text-xs ">                
                      <td class=" py-4 pl-4 relative"> {{ $expiredAccountName->website }}</td>                 
                      <td class="px-0 py-4 pl-4 relative" style="padding: 0 44px 0 240px;"> {{ date('F j, Y', strtotime($expiredAccountName->created_at))}}</td>                 
                  </tr>           
                  @endforeach
                
              </tbody>
              
          </table>
          <div class="mt-4">
            {{ $expiredAccountNames->links() }}
        </div>
        </div>
    </div>
  </div>
</div>



  </x-app-layout>    


  <script>
document.addEventListener('DOMContentLoaded', function() {
  const labels = @json($labels);
  const options = {
    series: [
      {
        name: "New accounts",
        color: "#31C48D",
        data: @json($newAccounts).data,
      },
      {
        name: "Expired Accounts",
        data: @json($expiredAccount).data,
        color: "#F05252",
      }
    ],
    chart: {
      sparkline: { enabled: false },
      type: "bar",
      width: "100%",
      height: 400,
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        horizontal: true,
        columnWidth: "100%",
        borderRadius: 6,
        dataLabels: { position: "top" },
      },
    },
    legend: {
      show: true,
      position: "bottom",
    },
    dataLabels: {
      enabled: false,
    },
    tooltip: {
      shared: true,
      intersect: false,
      formatter: function (value) {
        return value;
      }
    },
    xaxis: {
      labels: {
        show: true,
        style: { cssClass: 'text-xs ' },
        formatter: function(value) { return value; }
      },
      categories: labels,
      axisTicks: { show: false },
      axisBorder: { show: false },
    },
    yaxis: {
      max: 250,
      labels: {
        show: true,
        style: { cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400' }
      }
    },
    grid: {
      show: true,
      strokeDashArray: 4,
      padding: { left: 2, right: 2, top: -20 },
    },
    fill: { opacity: 1 },
  };

  if (document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("bar-chart"), options);
    chart.render();

    document.getElementById("6months").addEventListener('click', function() {
      chart.updateSeries([
        { name: "New accounts", data: @json($newAccounts).data, color: "#31C48D" },
        { name: "Expired Accounts", data: @json($expiredAccount).data, color: "#F05252" }    
      ]);


      document.getElementById("new-account").textContent = @json($firstquarterNew);
      document.getElementById("expired-account").textContent = @json($firstquarterExpired);
      document.getElementById("total").textContent = @json($totalAll);
      chart.updateOptions({
        xaxis: {
          categories: @json($labels)
        }
      });
    });

    document.getElementById("next6months").addEventListener('click', function() {
      chart.updateSeries([
        { name: "New accounts", data: @json($newAccountsNext).data, color: "#31C48D" },
        { name: "Expired Accounts", data: @json($expiredAccountNext).data, color: "#F05252" }
      ]);

      document.getElementById("new-account").textContent = @json($firstquarterNewNext);
      document.getElementById("expired-account").textContent = @json($firstquarterExpiredNext);
      document.getElementById("total").textContent = @json($totalAllNext);

      chart.updateOptions({
        xaxis: {
          categories: @json($labelsNext)
        }
      });
    });
  }
});
</script>









































































