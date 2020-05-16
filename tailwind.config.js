const defaultTheme = require('tailwindcss/defaultTheme');

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
    plugins: [
        require('@tailwindcss/custom-forms'),
        ...require('@iksaku/tailwindcss-plugins')
    ],
};
