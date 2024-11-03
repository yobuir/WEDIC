import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            animation: {
                'bounce-slow': 'bounce 3s infinite',
                'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'fade-in-up': 'fadeInUp 0.5s ease-out',
            },
            keyframes: {
                fadeInUp: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                }
            },
            fontFamily: {
                montserrat: ['Montserrat', 'sans-serif'],
            },
            colors: {
                // Primary blue colors from logo
                'wedic-blue': {
                    50: '#E6F4FF',
                    100: '#CCE9FF',
                    200: '#99D3FF',
                    300: '#66BDFF',
                    400: '#33A7FF',
                    500: '#0091FF', // Main logo blue
                    600: '#0074CC',
                    700: '#005799',
                    800: '#003A66',
                    900: '#001D33',
                },
                // Secondary pink/red colors from logo
                'wedic-pink': {
                    50: '#FFE6ED',
                    100: '#FFCCD9',
                    200: '#FF99B3',
                    300: '#FF668D',
                    400: '#FF3367',
                    500: '#FF0041', // Main logo pink
                    600: '#CC0034',
                    700: '#990027',
                    800: '#66001A',
                    900: '#33000D',
                },
                // Neutral colors
                neutral: {
                    50: '#F8FAFC',
                    100: '#F1F5F9',
                    200: '#E2E8F0',
                    300: '#CBD5E1',
                    400: '#94A3B8',
                    500: '#64748B',
                    600: '#475569',
                    700: '#334155',
                    800: '#1E293B',
                    900: '#0F172A',
                },
                // Success color
                success: {
                    50: '#ECFDF5',
                    100: '#D1FAE5',
                    200: '#A7F3D0',
                    300: '#6EE7B7',
                    400: '#34D399',
                    500: '#10B981',
                    600: '#059669',
                    700: '#047857',
                    800: '#065F46',
                    900: '#064E3B',
                },
                // Warning color
                warning: {
                    50: '#FFFBEB',
                    100: '#FEF3C7',
                    200: '#FDE68A',
                    300: '#FCD34D',
                    400: '#FBBF24',
                    500: '#F59E0B',
                    600: '#D97706',
                    700: '#B45309',
                    800: '#92400E',
                    900: '#78350F',
                },
                // Error color
                error: {
                    50: '#FEF2F2',
                    100: '#FEE2E2',
                    200: '#FECACA',
                    300: '#FCA5A5',
                    400: '#F87171',
                    500: '#EF4444',
                    600: '#DC2626',
                    700: '#B91C1C',
                    800: '#991B1B',
                    900: '#7F1D1D',
                },
            },
            // Custom box shadows
            boxShadow: {
                'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                'elegant': '0 0 15px rgba(0, 0, 0, 0.05), 0 0 6px rgba(0, 0, 0, 0.03)',
                'card': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
            },
            // Custom border radius
            borderRadius: {
                'xl': '1rem',
                '2xl': '1.5rem',
                '3xl': '2rem',
            },
        },
    },
    plugins: [
        forms,
        typography,
        // Custom plugin for aspect ratios
        plugin(({ addUtilities }) => {
            addUtilities({
                '.aspect-ratio-square': {
                    aspectRatio: '1 / 1',
                },
                '.aspect-ratio-video': {
                    aspectRatio: '16 / 9',
                },
                '.aspect-ratio-portrait': {
                    aspectRatio: '3 / 4',
                },
            });
        }),
        // Custom plugin for WEDIC gradients
        plugin(({ addUtilities }) => {
            addUtilities({
                '.text-gradient-wedic': {
                    background: 'linear-gradient(135deg, #0091FF, #FF0041)',
                    '-webkit-background-clip': 'text',
                    '-webkit-text-fill-color': 'transparent',
                },
                '.bg-gradient-wedic': {
                    background: 'linear-gradient(135deg, #0091FF, #FF0041)',
                },
                '.bg-gradient-wedic-reverse': {
                    background: 'linear-gradient(135deg, #FF0041, #0091FF)',
                },
            });
        }),
    ],
};
