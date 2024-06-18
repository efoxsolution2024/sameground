    
document.addEventListener('DOMContentLoaded', function()
{

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
            type: "bar",
            height: "320px",
            fontFamily: "Poppins",
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "70%",
                borderRadiusApplication: "end",
                borderRadius: 8,
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
            show: true,
            width: 0,
            colors: ["transparent"],
        },
        grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -14
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
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
            max: 20,
            show: false,
        },
        fill: {
            opacity: 1,
        },
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
  
      

      
