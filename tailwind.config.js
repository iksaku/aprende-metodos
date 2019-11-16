module.exports = {
    theme: {
        extend: {},
        customForms: theme => ({
            default: {
                'input, textarea, select, multiselect, checkbox, radio': {
                    borderColor: theme('colors.gray.400')
                }
            }
        })
    },
    variants: [
        'responsive',
        'group-hover',
        'focus-within',
        'first',
        'last',
        'odd',
        'even',
        'hover',
        'focus',
        'active',
        'visited',
        'disabled'
    ],
    plugins: [
        require('@tailwindcss/custom-forms')
    ]
};
