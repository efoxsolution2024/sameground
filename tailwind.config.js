import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppin: ['Poppins', 'sans-serif'],
                robott: ['Roboto Condensed', 'sans-serif'],
                roboto2: ['Roboto', 'sans-serif'],
                sofia:['Sofia Sans Condensed Italic']
            },
         
        },
    },

    plugins: [forms],
};
