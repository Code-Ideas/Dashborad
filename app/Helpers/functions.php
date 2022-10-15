<?php

use Illuminate\Support\Facades\Request;

/**
 * @return string
 */
function switchLocaleUrl()
{
    $segments = Request::segments();
    if (config('app.locale') == "en") {
        $segments[0] = 'ar';
    } else {
        $segments[0] = 'en';
    }
    return $url = '/'.implode('/', $segments);
}

/**
 * @param $route
 * @return bool
 */
function isRouteActive($route)
{
    return !! preg_match("/^{$route}$/", Request::route() ? Request::route()->getName() : '');
}

/**
 * @param $route
 * @return string
 */
function activateRouteClass($route)
{
    if (! isRouteActive($route)) {
        return '';
    }
    return 'is-active';
}

/**
 * @param $numbers
 * @return mixed
 */
function translateNumbers($numbers)
{
    // Don't translate if the locale is English
    if (config('app.locale') === 'en') {
        return $numbers;
    }

    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
    $english = ['9', '8', '7', '6', '5', '4', '3', '2', '1', '0'];

    return str_replace($english, $arabic, $numbers);
}

function translateCurrency($currency)
{
    // Don't translate if the locale is English
    if (config('app.locale') === 'en') {
        return $currency;
    }

    $arabic = ['جنيه', 'دولار', 'يورو', 'درهم اماراتي', 'ريال سعودي', 'جنيه استرليني'];
    $english = ['EGP', 'USD', 'EU', 'AED', 'SAR', 'GBP'];

    return str_replace($english, $arabic, $currency);
}

function generateCode()
{
    $letters = range('A', 'Z');
    $code = $letters[rand(0, 25)].$letters[rand(0, 25)].random_int(0000, 9999);

    return checkCode($code);
}
