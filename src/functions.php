<?php

namespace {

    use Choval\Damm;

    if (!function_exists('damm_digit')) {
        function damm_digit(string $number) : int
        {
            return Damm::digit($number);
        }
    }

    if (!function_exists('damm_valid')) {
        function damm_valid(string $number, int $digit=null) : bool
        {
            return Damm::valid($number, $digit);
        }
    }

}

namespace Choval {

    use Choval\Damm;

    function damm_digit(string $number) : int
    {
        return Damm::digit($number);
    }

    function damm_valid(string $number, int $digit=null) : bool
    {
        return Damm::valid($number, $digit);
    }

}
