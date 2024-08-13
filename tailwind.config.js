  // tailwind.config.js
  module.exports = {
    purge: [],
    purge: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    
     darkMode: false, // or 'media' or 'class'
     theme: {
       extend: {

       },
     },
     variants: {
       extend: {
        height: ['sm', 'md'],
      borderRadius: ['sm'],
      alignSelf: ['sm'],
       },
     },
     plugins: [
      require('taos/plugin'),
     ],
     safelist: [
      '!duration-[0ms]',
      '!delay-[0ms]',
      'html.js :where([class*="taos:"]:not(.taos-init))'
    ],
    content: {
      relative: true,
      transform: (content) => content.replace(/taos:/g, ''),
      files: ['./src/*.{html,js}'],
    },
   }