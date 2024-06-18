    
document.addEventListener('DOMContentLoaded', function()
{

/* Quote API */
    const quote = document.querySelector('.quoteText');
    const author = document.querySelector('.author');
    const api_url = "https://api.quotable.io/random";
    
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
});
/* Jquery  */


