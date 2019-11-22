window.katex = require('katex');
import renderMathInElement from "katex/contrib/auto-render/auto-render";

document.addEventListener('DOMContentLoaded', function () {
    renderMathInElement(document.body);
});
