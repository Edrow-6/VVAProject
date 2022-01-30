const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
      './views/**/**/*.php',
      './public/assets/js/*.js',
      './app/Utils/Templates/*.php'
  ],
<<<<<<< HEAD
=======
  darkMode: 'class', // 'class' or remove if 'media/false'
>>>>>>> dev
  theme: {
    extend: {
      transitionProperty: {
        'height': 'height',
        'spacing': 'margin, padding',
        'visibility': 'visibility'
      },
      backdropBlur: {
        '4xl': '80px',
      }
<<<<<<< HEAD
=======
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      gray: colors.gray,
      red: colors.red,
      orange: colors.orange,
      amber: colors.amber,
      yellow: colors.yellow,
      lime: colors.lime,
      green: colors.green,
      emerald: colors.emerald,
      teal: colors.teal,
      cyan: colors.cyan,
      sky: colors.sky,
      blue: colors.sky,
      indigo: colors.indigo,
      violet: colors.violet,
      purple: colors.purple,
      fuchsia: colors.fuchsia,
      pink: colors.pink,
      rose: colors.rose,
      white: colors.white,
      black: colors.black,
      twitter: '#1da1f2',
      github: '#333'
>>>>>>> dev
    },
    fontFamily: {
      sans: ['Manrope', ...defaultTheme.fontFamily.sans],
    },
  },
<<<<<<< HEAD
  plugins: [
    require('@tailwindcss/typography'),
    require("@tailwindcss/forms"), 
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/line-clamp')
  ],
=======
  plugins: [require("@tailwindcss/forms"), require('@tailwindcss/line-clamp'), require('@tailwindcss/typography')],
>>>>>>> dev
};
