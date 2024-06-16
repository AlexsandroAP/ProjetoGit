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
            borderRadius: {
                'extra-lg': '1.5rem',
            },

            spacing: {
                '20rem': '20rem',
                '15rem': '10rem',
              },

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                'vermelho': '#C3020E',
                'verde-claro': '#219E88',
                'cinza': '#111827',
              },

        },
    },

    plugins: [forms],

    
};


  
