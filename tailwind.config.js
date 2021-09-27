module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      backgroundImage: {
        'background-1': 'url(../images/background-1.jpg)',
      },
      colors: {
        green: {
          light: '#5bd987',
          DEFAULT: '#50bf77',
          dark: '#50bf77',
        },
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [require('tailwindcss'), require('autoprefixer')],
};
