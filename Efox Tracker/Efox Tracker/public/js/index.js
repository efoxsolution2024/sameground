    
document.addEventListener('DOMContentLoaded', function()
{

/* Quote API */
    const quote = document.querySelector('.quoteText');
    const author = document.querySelector('.author');
    const api_url = "http://api.quotable.io/random";
    
    async function getQuote(url) {
        const response = await fetch(url);
        const data = await response.json();
        const newQuote = data.content;
        const newAuthor = data.author;
        
        // Store the new quote and author in local storage
        localStorage.setItem('quote', newQuote);
        localStorage.setItem('author', newAuthor);
        
        // Display the new quote and author
        displayQuote(newQuote, newAuthor);
        
        // Store the current time in milliseconds in local storage
        localStorage.setItem('lastQuoteUpdate', Date.now());
    }
    
    function displayQuote(quoteContent, authorName) {
        quote.innerHTML = quoteContent;
        author.innerHTML = authorName;
    }
    
    // Function to check if 24 hours have passed since last update
    function shouldUpdateQuote() {
        const lastUpdate = localStorage.getItem('lastQuoteUpdate');
        if (!lastUpdate) return true; // If there's no last update, update the quote
        const currentTime = Date.now();
        const twentyFourHours = 24 * 60 * 60 * 1000; // 24 hours in milliseconds
        return currentTime - lastUpdate >= twentyFourHours;
    }
    
    // Check if there's a stored quote and author
    const storedQuote = localStorage.getItem('quote');
    const storedAuthor = localStorage.getItem('author');
    
    // If there's a stored quote and author, display them
    if (storedQuote && storedAuthor) {
        displayQuote(storedQuote, storedAuthor);
    } else {
        getQuote(api_url);
    }
    
    // Reset the quote every day (24 hours)
    setInterval(() => {
        if (shouldUpdateQuote()) {
            getQuote(api_url);
        }
    }, 60 * 60 * 1000); // Check every hour if the quote needs to be updated

/* End for Quote API */


/* Dashboard Graph */

    const days = ["Mon", "Tue", "Wed", "Thu", "Fri"];

    function getPhilippinesDayOfWeek() {
        const options = { timeZone: 'Asia/Manila', weekday: 'short' };
        return new Intl.DateTimeFormat('en-US', options).format(new Date());
    }

    const dayOfWeek = getPhilippinesDayOfWeek();

    const MAX_ACCOUNTS = 20;

    const accountData = days.map(day => ({
        x: day,
        y: day === dayOfWeek ? dateAccount : 0.2
    }));

    const expiredData = days.map(day => ({
        x: day,
        y: day === dayOfWeek ? expiredTodayCount : 0.2
    }));

    const options = {
        colors: ["#1A56DB", "#FDBA8C"],
        series: [
            {
                name: "New Account",
                color: "#1A56DB",
                data: accountData,
            },
            {
                name: "Expired Domain",
                color: "#FDBA8C",
                data: expiredData,
            },
        ],
        chart: {
            type: "bar",
            height: "320px",
            fontFamily: "Inter, sans-serif",
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
                fontFamily: "Inter, sans-serif",
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
                top: -14,
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        xaxis: {
            categories: days,
            floating: false,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
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
            max: MAX_ACCOUNTS,
            tickAmount: 4,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                },
                formatter: function (val) {
                    return val.toFixed(0);
                },
            },
        },
        fill: {
            opacity: 1,
        },
    }

    if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("column-chart"), options);
        chart.render();
    }
/* End for Dashboard Graph */
});


/* Jquery  */


