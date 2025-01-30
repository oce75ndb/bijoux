import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        // A réviser
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.css',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                beige: {
                    DEFAULT: '#F5EBE0',
                },
                gold: {
                    DEFAULT: '#BEA898',
                },
                black: {
                    DEFAULT: '#000000',
                },
                brown: {
                    DEFAULT: '#412E20',
                },
            },
        },
    },

    plugins: [forms],
};
