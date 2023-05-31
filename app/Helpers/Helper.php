<?php

if (!function_exists('userIsDeveloper')) 
{
    function userIsDeveloper () : bool
    {
        $profile = auth()->user()->profile ?? null;

        if ($profile->provider === "GITHUB") {
            return true;
        }

        return false;
    }
}

if (!function_exists('userIsRecruiter')) 
{
    function userIsRecruiter () : bool
    {
        $profile = auth()->user()->profile ?? null;

        if ($profile->provider === "GOOGLE") {
            return true;
        }

        return false;
    }
}