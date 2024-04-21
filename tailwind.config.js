/** @type {import('tailwindcss').Config} */
export default {
  safelist: [
    'border-error',
    'border-success'
  ],
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    "./resources/**/*.blade.php",
    "./resources/*/*.js",
  ],
  theme: {
    container: {
      center: true, 
      screens: {
        'sm': '100%',
        'md': '100%',
        'lg': '1024px',
        'xl': '1340px',
        '2xl': '1340px',
      },
      padding: {
        DEFAULT: '20px',
      },
    },
    extend: {
      colors: {
        'background': '#1D2127',
        'primary': '#C0EBB9',
        'secondary': '#A6D39F',
        'input': '#2A2F38',
        'input-border': '#353B46',
        'text-primary': '#FFFFFF',
        'text-secondary': '#B5B5B5',
        'container': '#272C34',
        'tertiary': '#E5E5E5',
        'error': '#FF9E9E',
        'success': '#A0FF9E',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

