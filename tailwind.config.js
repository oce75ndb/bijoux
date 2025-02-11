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
            keyframes: {
                fadeIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" }
                },
                slideUp: {
                    "0%": { transform: "translateY(20px)", opacity: "0" },
                    "100%": { transform: "translateY(0)", opacity: "1" }
                }
            },
            animation: {
            "fade-in": "fadeIn 0.8s ease-out",
            "slide-up": "slideUp 0.6s ease-out"
            },
            fontFamily: {
                sans: ["@import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap');", "sans-serif"],
            },
            colors: {
                beige: {
                    DEFAULT: '#F5EFE6',
                },
                gold: {
                    DEFAULT: '#d9c2a9',
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
