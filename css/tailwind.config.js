module.exports = {
  content: ["./**/*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        primary: '#000000',
        secondary: '#FFFFFF',
        accent: '#2D3748',
        'gray-1': '#111827',
        'gray-2': '#1F2937',
        'gray-3': '#374151',
        'gray-4': '#6B7280',
        'highlight': '#E5E7EB'
      },
      fontFamily: {
        'heading': ['"Roboto Slab"', 'serif'],
        'body': ['Montserrat', 'sans-serif']
      },
      animation: {
        'float': 'float 6s ease-in-out infinite',
        'pulse-glow': 'pulse-glow 2s ease-in-out infinite',
        'spin-slow': 'spin 8s linear infinite',
        'text-shimmer': 'textShimmer 3s ease-in-out infinite'
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-20px)' }
        },
        'pulse-glow': {
          '0%, 100%': { opacity: '1' },
          '50%': { opacity: '0.7' }
        },
        textShimmer: {
          '0%': { backgroundPosition: '-500px 0' },
          '100%': { backgroundPosition: '500px 0' }
        }
      }
    }
  },
  plugins: []
}