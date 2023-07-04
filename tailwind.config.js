/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'media',
  content: [
    "./src/**/*.{html,js}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    backgroundColor: 'bg-emerald-800',
    backgroundImage: url('/dist/assets/images/wine-bg2.webp'),
    extend: {
      borderRadius: {
        '4xl': '2rem',
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}

