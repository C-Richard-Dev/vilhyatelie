import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                pink: {
                    50: '#ffe5ed',
                    100: '#ffb3c7',
                    200: '#ff80a1',
                    300: '#ff4d7b',
                    400: '#ff265f',
                    500: '#FF1C4A', // rosa choque principal
                    600: '#e01841',
                    700: '#b01332',
                    800: '#800e23',
                    900: '#4f0914',
                },
                primary: {
                    DEFAULT: '#FF1C4A', // alias para rosa choque
                },
            },
        },
    },

    plugins: [forms],
};
