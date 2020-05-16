<?php

if (!function_exists('markdown')) {
    /**
     * @param string $content
     * @return string
     */
    function markdown(string $content): string
    {
        return app('markdown')->convertToHtml($content);
    }
}
