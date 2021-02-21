<?php

if (! function_exists('isActive')) {
    function isActive($url)
    {
        return request()->is(
            str_replace(config('app.url') . '/', '', $url)
        );
    }
}
