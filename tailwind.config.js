module.exports = {
  content: [
    'pengurus/dashboard.php',
    'pengurus/daftar.php',
    'pengurus/index.php',
    'pengurus/hotel.php',
    'index.php',
    'hotel.php',
    'daftar.php',
    'search.php',
    'dashboard.php',
    'invoice.php',
    'payment.php',
    'src/index.html',
    'src/masuk.html',
    'src/daftar.html',
    'src/lupakatasandi.html',
    'src/dashboard.html',
    'src/pengurus/index.html',
    'src/pengurus/dashboard.html'
  ],
  theme: {
    extend: {
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'],
        'playfair-display': ['Playfair Display', 'serif'],
      },
      fontSize: {
        'xs': '12px',
        'sm': '14px',
        'base': '20px',
        'md': '26px',
        'lg': '28px',
        'xl': '44px',
      },
      colors: {
        'primary': '#3D61FF',
        'primary-hover': '#3757e6',
        'primary-light': '#E4E9FF',
        'primary-light-hover': '#DBE0F9',
        'secondary': '#FE6A5F',
        'secondary-hover': '#F05C51',
        'tertiary': '#FDF3E6',
        'tertiary-text': '#9D8566',
        'quaternary': '#242424',
        'quinary': '#7B838A',
        'border': '#E1E1E1',
      },
      width: {
        '500px': '500px',
        '800px': '800px',
      },
      inset: {
        '100px': '100px',
      },
    },
  },
  plugins: [],
}
