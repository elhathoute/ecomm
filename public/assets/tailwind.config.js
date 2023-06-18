/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['../*.php','../pages/*.php','../pages/dashboard/*.php'],
  theme: {
    screens: {
      sm: '280px',
      md: '768px',
      lg: '976px',
      xl: '1440px',
    },
    colors:{
      primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a"},
      transparent: 'transparent',
      current:'currentColor',
      'while':'#fff',
      'color-gray-dark':'#262626',
      'color-red-button':'#ef4444',
      'color-gray-background-light':'#d4d4d8',
      'color-rating':'#f59e0b'
    },
    fontFamily:{
      'body': [
        'Inter', 
        'ui-sans-serif', 
        'system-ui', 
        '-apple-system', 
        'system-ui', 
        'Segoe UI', 
        'Roboto', 
        'Helvetica Neue', 
        'Arial', 
        'Noto Sans', 
        'sans-serif', 
        'Apple Color Emoji', 
        'Segoe UI Emoji', 
        'Segoe UI Symbol', 
        'Noto Color Emoji'
      ],
      'sans': [
        'Inter', 
        'ui-sans-serif', 
        'system-ui', 
        '-apple-system', 
        'system-ui', 
        'Segoe UI', 
        'Roboto', 
        'Helvetica Neue', 
        'Arial', 
        'Noto Sans', 
        'sans-serif', 
        'Apple Color Emoji', 
        'Segoe UI Emoji', 
        'Segoe UI Symbol', 
        'Noto Color Emoji'
      ]
    }
    //extend: {},
  },
  plugins: [
    require('tailwind-scrollbar-hide'),//hide sidebar
    require('tailwind-scrollbar')
  ],
}
