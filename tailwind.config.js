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
                fadeInDown: {
                    "0%": { opacity: "0", transform: "translateY(-20px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" }
                },
                fadeInUp: {
                    "0%": { opacity: "0", transform: "translateY(20px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" }
                },
                slideUp: {
                    "0%": { transform: "translateY(20px)", opacity: "1" },
                    "100%": { transform: "translateY(0)", opacity: "1" }
                },
                slideLeft: {
                    "0%": { transform: "translateX(-20px)", opacity: "1" },
                    "100%": { transform: "translateX(0)", opacity: "1" }
                },
                zoomIn: {
                    "0%": { transform: "scale(0.9)", opacity: "1" },
                    "100%": { transform: "scale(1)", opacity: "1" }
                  }
            },
            animation: {
            "fade-in": "fadeIn 0.8s ease-out",
            "fade-in-down": "fadeInDown 0.8s ease-out",
            "fade-in-up": "fadeInUp 0.8s ease-out",
            "slide-up": "slideUp 0.6s ease-out",
            "slide-left": "slideLeft 0.6s ease-out",
            "zoom-in": "zoomIn 0.8s ease-out"
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
