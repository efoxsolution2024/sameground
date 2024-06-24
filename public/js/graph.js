document.addEventListener('DOMContentLoaded', function() {
    const options = {
        colors: ["#1A56DB", "#FDBA8C"],
        series: [
            {
                name: "New Website",
                color: "#1A56DB",
                data: newData,
            },
            {
                name: "Expired Account",
                color: "#FDBA8C",
                data: expiredData,
            },
        ],
        chart: {
            type: "line",
            height: "320px",
            fontFamily: "Poppins",
            toolbar: {
                show: true,
            },
            zoom: {
                enabled: false
            },
        },
        plotOptions: {
            line: {
                step: "stepline"
            },
        },
        tooltip: {
            shared: true,
            intersect: false,
            style: {
                fontFamily: "Poppins",
            },
        },
        states: {
            hover: {
                filter: {
                    type: "darken",
                    value: 1,
                },
            },
        },
        stroke: {
             curve: 'straight'
        },
        dataLabels: {
            enabled: true,     
            top:0,    
            foreColor: '#fff',
            style: {
                colors: '#D8BFD8'
              },   
            background: {
                enabled: false,  
                foreColor: '#fff',   
          },
          dropShadow: {
            enabled: true,
            left: 0,
            top: 0, 
            opacity: 1
        },
         
        style: {
            fontSize: '10px',
            color: '#fff',
            position: 'absolute',
            top: '-50px',
        },
        },
        legend: {
            show: false,
        },
        markers: {
            size: 12,
            colors: ["#1A56DB", "#FDBA8C"],
            strokeColors: "#ffffff",
            strokeWidth: 2,
            shape: "circle",
            hover: {
                sizeOffset: 2
            },
        },
        xaxis: {
            floating: false,
            labels: {
                show: true,
                style: {
                    fontFamily: "Poppins",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            min: 0,
            max: 10,
            show: true,         
        },
        grid: {
            show: false,
            strokeDashArray: 4,
            padding: { left: 2, right: 2, top: -20 },
            fill: { opacity: 0.3 }
        },
          fill: { opacity: 1 },
   
    };

    let chart;

    if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
        chart = new ApexCharts(document.getElementById("column-chart"), options);
        chart.render();
    }

    document.getElementById("thisWeek").addEventListener('click', function() {
        chart.updateSeries([
            {
                name: "New Website",
                data: newData,
            },
            {
                name: "Expired Account",
                data: expiredData,
            }
        ]);
    });

    document.getElementById("last7Days").addEventListener('click', function() {
        chart.updateSeries([
            {
                name: "New Website",
                data: newData7,
            },
            {
                name: "Expired Account",
                data: expiredData7,
            }
        ]);
    });
});