<?php

use App\Helpers\General\ErrorsHelper;

if (! function_exists('ColoringInput')) {
    /**
     * Access the  Color Error helper.
     */
    function ColoringError()
    {
        return resolve(ErrorsHelper::class);
    }
}


if (! function_exists('TextError')) {
    /**
     * Access the  Color Error helper.
     */
    function TextError()
    {
        return resolve(ErrorsHelper::class);
    }
}
