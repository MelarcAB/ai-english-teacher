/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./resources/**/**/*.blade.php', './resources/**/**/*.js', '/resources/views/layouts/landing.blade.php',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php'],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
      '@layer utilities': {
        '.custom-class': {
          'background-color': 'bg-blue-100',
          'border': 'border-gray-200',
          'margin-bottom': 'mb-4',
        },
      },
    },
  },
  plugins: [],
}
