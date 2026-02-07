/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'class', // For toggling modes
    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', 'IBM Plex Sans Arabic', 'sans-serif'], // Default sans
                header: ['Outfit', 'sans-serif'],
                arabic: ['IBM Plex Sans Arabic', 'sans-serif'],
            },
            colors: {
                // Custom color palette for the app
                brand: {
                    50: '#f0f9ff',
                    100: '#e0f2fe',
                    500: '#0ea5e9',
                    600: '#0284c7',
                    700: '#0369a1',
                    900: '#0c4a6e',
                },
                dark: {
                    bg: '#0F172A', // Slate 900
                    card: '#1E293B', // Slate 800
                    text: '#F8FAFC', // Slate 50
                }
            },
            animation: {
                'blob': 'blob 7s infinite',
            },
            keyframes: {
                blob: {
                    '0%': { transform: 'translate(0px, 0px) scale(1)' },
                    '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                    '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                    '100%': { transform: 'translate(0px, 0px) scale(1)' },
                }
            }
        },
    },
    plugins: [],
}
