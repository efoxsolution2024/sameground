<x-app-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>   

    <div class="md:container md:mx-auto bg-indigo-50 rounded-3xl py-14 border px-10 box-border shadow mb-16 relative"> 
        <div class="flex justify-between mb-10 items-center">
            <h2 class="text-2xl font-semibold leading-7 text-gray-900 ">All Account's</h2>
            <a href=" {{route('all_business.create')}} " class="bg-indigo-600 px-3 py-2 rounded-xl text-white">Add Account</a>
        </div>

        <div class="flex align-middle justify-between mb-16">
            {{-- <div class="sort flex gap-20">  --}}
            <div class="Sort by">
                <label for="duration" class="text-sm block font-base leading-6 text-gray-900 mb-2">Sort by:</label>       
                    <select id="statusFilter" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="">Please Select</option>
                        <option value="active">Active</option>
                        <option value="inactive">In Active</option>
                        <option value="Writer's Republic">Writer's Republic</option>                        
                        <option value="Milton & Hugo">Milton & Hugo</option>
                        <option value="Older version">Older version</option>
                        <option value="Writer's Republic (BLP)">Writer's Republic (BLP)</option>
                        <option value="6.5.3">6.5.3</option>   
                        <option value="priority">Priority</option> 
                    </select>
            </div>    
            
            <div class="Wordpress Version">
                <label for="duration" class="text-sm block font-base leading-6 text-gray-900 mb-2">Wordpress Version</label>       
                    <select id="statusFilter" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="">Please Select</option>
                        <option value="6.5.3">6.5.3</option>
                        <option value="6.5.2">6.5.2</option>
                        <option value="6.5">6.5</option>
                        <option value="6.4.4">6.4.4</option>
                        <option value="6.4.3">6.4.3</option>
                        <option value="Older version">Older version</option>
                    </select>
            </div>

            <div class="Duration">
                <label for="duration" class="text-sm block font-base leading-6 text-gray-900 mb-2">Duration</label>       
                    <select id="statusFilter" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-50   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="">Please Select</option>
                        <option value="1 Year">1 Year</option>
                        <option value="2 Years">2 Years</option>
                        <option value="3 Years">3 Years</option>
                        <option value="4 Years">4 Years</option>
                        <option value="5 Years">5 Years</option>
                        <option value="6 Years">6 Years</option>
                        <option value="7 Years">7 Years</option>
                        <option value="8 Years">8 Years</option>
                        <option value="9 Years">9 Years</option>
                        <option value="10 Years">10 Years</option>
                    </select>
            </div>

        {{-- </div> --}}

            <div class="form-group search float-right w-[25%]">
                <input type="text" name="search" id="search" class="pl-6 form-control w-[78%] text-[15px] text-gray-700 px-2 py-2 mt-7 border-b border-gray-300 border-t-0 border-l-0 border-r-0 focus:outline-none focus:border-b-5 focus:ring-0 focus:border-blue-500 mr-5   rounded-xl" placeholder="Search Account's" />
            </div>           
        </div>   

        
        <table class="w-full text-base text-left rtl:text-right mb-14">
            <thead class="">
                <tr class="font-normal border-b-2 border-gray-300">
                    <th scope="col" class="py-3 text-base text-gray-900 font-semibold pl-4"> Author </th>
                    <th scope="col" class="px-6 py-3 font-semibold text-base text-gray-900"> Website </th>
                    <th scope="col" class="px-6 py-3 font-semibold text-base text-gray-900"> Business </th>
                    <th scope="col" class="px-6 py-3 font-semibold text-base text-gray-900"> Duration </th>
                    <th scope="col" class="px-6 py-3 font-semibold text-base text-gray-900"> Status </th>
                    @role('admin')
                        <th scope="col" class="px-6 py-3 font-semibold text-base text-gray-900"> Action </th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                {{-- Ajax --}}
            </tbody>
        </table>
        
        <!-- Pagination -->
        <div class="flex justify-between items-center">
            {{-- <div>Total Account's: <span id="activeCount" >{{ $totalAccounts }} </span></div> --}}
            <div class="total-accounts text-sm">
                <!-- Total number of accounts on the first page will be displayed here -->
            </div>
            <div class="pagination flex flex-wrap gap-[7px] justify-end"> </div>
        </div>   

        <!-- Live Search -->
        <script>
            $(document).ready(function(){
                // Variables to manage pagination
                var currentPage = 1;
                var itemsPerPage = 10;
                var data = [];
        
                // Function to fetch data from server
                function fetchData(query = '', status = '') {
                    $.ajax({
                        url: "{{ route('all_business.index') }}",
                        method: 'GET',
                        data: { query: query, status: status },
                        dataType: 'json',
                        success: function(response) {
                            // Store fetched data
                            data = response;
        
                            // Display first page of data
                            displayData(currentPage);
                            
                            // Calculate and display pagination links
                            displayPagination();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', xhr.responseText);
                        }
                    });
                }
        
                function displayData(page) {
                    var startIndex = (page - 1) * itemsPerPage;
                    var endIndex = startIndex + itemsPerPage;
                    var pageData = data.slice(startIndex, endIndex);

                    if (pageData.length === 0) {
                            // Display a message when no results are found
                            $('tbody').html('<tr><td colspan="6" class="text-center py-4">No results found.</td></tr>');
                            return;
    }
        
                    var output = '';
                    pageData.forEach(function(row) {
                        // let date = new Date(row.created_at);
                        // let formattedDate = ("0" + date.getDate()).slice(-2) + "-" + 
                        //         ("0" + (date.getMonth() + 1)).slice(-2) + "-" + 
                        //         date.getFullYear().toString().slice(-2);
                        output += '<tr class="border-b-1 border-gray-300 text-sm ">';                       
                        output += '<td class="px-0 py-4 pl-4 relative">';
                        output += '<a href="/all_business/' + row.id + '/show">';
                        output += row.priority ? '<div class="text-red-500 font-semi-bold inline text-xl absolute left-[5px] top-[15px]">! </div>' : '';
                        output += row.author_name;
                        output += '</a>';
                        output += '</td>';
                        output += '<td class="px-6 py-4"><a href="https://'  + row.website + '" target="_blank">' + row.website + '</a></td>';
                        output += '<td class="px-6 py-4">' + row.business + '</td>';
                        // output += '<td class="px-6 py-4">' + formattedDate  + '</td>';
                        output += '<td class="px-6 py-4">' + row.duration + '</td>';
                        output += '<td class="px-6 py-4">' + (row.is_active ? '<svg class="w-6 h-6 text-gray-800 dark:text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/></svg>' : '<svg class="w-6 h-6 text-gray-800 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>') + '</td>';
                        output += '<td class="py-4 text-gray-500 flex items-center">';
                        @role('admin')
                            output += '<a href="/all_business/' + row.id + '/edit" class="px-6 text-indigo-600 font-medium">Edit</a>';  
                            output += '<form action="/all_business/' + row.id + '/delete" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this business?\')">';
                            output += '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
                            output += '<input type="hidden" name="_method" value="DELETE">';
                            output += '<button type="submit" class="font-medium text-red-500">Delete</button>';
                        @endrole
                        output += '</form>';
                        output += '</td>';
                        output += '</tr>';
                    });
        
                    // Display data in table body
                    $('tbody').html(output);
                }

            // Variables to manage pagination
            var currentPage = 1;
            var itemsPerPage = 10;

            // Function to display pagination links
            function displayPagination() {
                var totalPages = Math.ceil(data.length / itemsPerPage);
                var totalAccounts = data.length; // Total number of accounts
                var pagination = '';

                // Previous button
                pagination += '<li class="page-item ' + (currentPage == 1 ? 'disabled' : '') + '"><a class="page-link" href="#" data-page="prev"><<</a></li>';
                pagination += '<li class="page-item ' + (currentPage == 1 ? 'disabled' : '') + '"><a class="page-link" href="#" data-page="prev"><</a></li>';

                // Page numbers
                var startPage = Math.max(1, currentPage - 1);
                var endPage = Math.min(totalPages, currentPage + 1);

                if (startPage > 1) {
                    pagination += '<li class="page-item hover:bg-indigo-50"><a class="page-link" href="#" data-page="1">1</a></li>';
                    if (startPage > 2) {
                        pagination += '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
                    }
                }
                
                for (var i = startPage; i <= endPage; i++) {
                    pagination += '<li class="page-item ' + (i === currentPage ? 'active' : '') + '"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
                }
                
                if (endPage < totalPages) {
                    if (endPage < totalPages - 1) {
                        pagination += '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
                    }
                    pagination += '<li class="page-item"><a class="page-link" href="#" data-page="' + totalPages + '">' + totalPages + '</a></li>';
                }
                
                // Next button
                pagination += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '"><a class="page-link" href="#" data-page="next">></a></li>';
                pagination += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '"><a class="page-link" href="#" data-page="next">>></a></li>';

                // Calculate total displayed accounts count for the current page
                var startIndex = (currentPage === 10) * itemsPerPage;
                var endIndex = Math.min(currentPage * itemsPerPage, totalAccounts);
                var totalDisplayedAccounts = endIndex - startIndex;

                // Display total number of accounts for the current page
                $('.total-accounts').html('<span>' + totalDisplayedAccounts + ' Accounts out of ' + totalAccounts + '</span>');

                // Display pagination links
                $('.pagination').html(pagination);
            }

            // Pagination buttons click event
            $(document).on('click', '.page-link', function() {
                var page = $(this).data('page');
                if (page === 'prev' && currentPage > 1) {
                    currentPage--;
                } else if (page === 'next' && currentPage > Math.ceil(data.length / itemsPerPage)) {
                    currentPage++;
                } else if (typeof page === 'number') {
                    currentPage = page;
                }
                displayPagination();
            });

            fetchData();




        
                // Initial data fetch on page load
                fetchData();
        
                // Pagination buttons click event
                $(document).on('click', '.page-link', function() {
                    var page = $(this).data('page');
                    if (page === 'prev' && currentPage > 1) {
                        currentPage--;
                    } else if (page === 'next' && currentPage < Math.ceil(data.length / itemsPerPage)) {
                        currentPage++;
                    } else if (typeof page === 'number') {
                        currentPage = page;
                    }
                    displayData(currentPage);
                    displayPagination();
                });
        
                /* Search input keyup event */       
                $(document).on('keyup', '#search', function() {
                    var query = $(this).val();
                    var status = $('#statusFilter').val(); // Get the current filter status
                    fetchData(query, status);
                });

                // Filter dropdown change event
                $(document).on('change', '#statusFilter', function() {
                    var query = $('#search').val();
                    var status = $(this).val();
                    fetchData(query, status);
                });

            });
        </script>
        



    </div>
</x-app-layout>


