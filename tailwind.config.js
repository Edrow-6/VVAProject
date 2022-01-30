const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
      './views/**/**/*.php',
      './public/assets/js/*.js',
      './app/Utils/Templates/*.php'
  ],
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
    },
    fontFamily: {
      sans: ['Manrope', ...defaultTheme.fontFamily.sans],
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require("@tailwindcss/forms"), 
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/line-clamp')
  ],
};
