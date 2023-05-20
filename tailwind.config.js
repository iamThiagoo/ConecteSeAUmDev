const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    mode: 'jit',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    100: "#FE3C72",
                    75: "#FE6B94",
                    50: "#CCC",
                    25: "#FFCEDC"
                },
                secondary: {
                    100: '#FF7854',
                    75: '#FF9A7F',
                    50: '#FFBBA9',
                    25: '#FFDDD4'
                },
                gray: {
                    100: '#424242',
                    75: '#717171',
                    65: '#c1c1c2',
                    50: '#A0A0A0',
                    35: '#f6f6f7',
                    25: '#D4D8DD',
                    10: '#F7F8FC',
                }
            }
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
