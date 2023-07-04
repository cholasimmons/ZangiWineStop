/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'media',
  content: [
    "./src/**/*.{html,js}"
  ],
  theme: {
    backgroundColor: 'bg-emerald-800',
    extend: {
      borderRadius: {
        '4xl': '2rem',
      }
    },
  },
  plugins: [

  ],
}

