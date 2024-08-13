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
        backgroundImage: {
          'slider': "url('https://dinamikaindomedia.co.id/sliders/ZOje5kj4ZCSup0iXRkOf2p4uzMqMaH6T1vV5B2Fc.png')",
        },
        height: {
          'calc-100-minus-2rem': 'calc(100% - 2rem)', // sm:h-[calc(100%_-_2rem)]
          'calc-100-minus-4rem': 'calc(100% - 4rem)', // md:h-[calc(100%_-_4rem)]
        },
        borderRadius: {
          'ss-30px': '30px', // sm:rounded-ss-[30px]
        },
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
      function ({ addUtilities }) {
        addUtilities({
          '.self-end': {
            alignSelf: 'end', // sm:self-end
          },      
        });
        },
     ],
   }