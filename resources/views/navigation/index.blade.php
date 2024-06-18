           
            <div class="mt-5 w-[60%] px-10 mb-16">
              <canvas id="chart" class="w-[71%]"></canvas>
            </div>


            @foreach ($expiredLists as $expiredList)
              <ul>
                <li>{{ $expiredList->website }}</li>    
            </ul>
            
            @endforeach

            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script>
      var ctx = document.getElementById('chart').getContext('2d');
      var userChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: {!! json_encode($labels) !!},
          datasets: {!! json_encode($datasets) !!}
        },
      });
</script>
