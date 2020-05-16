const defaultConfig = require('tailwindcss/defaultConfig')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultConfig.theme.fontFamily.sans],
            },
        },
    },
    purge: {
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
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/markdown$/],
        },
    },
    variants: {
        backgroundColor: [...defaultConfig.variants.backgroundColor, 'hocus'],
        textColor: [...defaultConfig.variants.textColor, 'hocus']
    },
    plugins: [
        require('@tailwindcss/custom-forms'),
        require('@tailwindcss/ui'),
        ...require('@iksaku/tailwindcss-plugins')
    ],
};
