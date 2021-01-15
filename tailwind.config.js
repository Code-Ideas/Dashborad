// tailwind.config.js
module.exports = {
    purge: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
     darkMode: false, // or 'media' or 'class'
     theme: {
      extend: {
        fontFamily: {
          'sans': ['Droid Arabic Kufi', 'Helvetica', 'Arial', 'sans-serif']
        }
      },
     },
     variants: {
       extend: {},
     },
     plugins: [],
   }