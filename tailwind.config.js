/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./src/**/*.{html,js}"
  ],
  theme: {
    extend: {
      backgroundImage: {
        'hero-pattern': "url('dist/assets/images/wine-bg2.webp')"
      }
    }
  },
  plugins: []
}

