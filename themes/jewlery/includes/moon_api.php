<?php

function moon_phase($year, $month, $day)

{

    /*

    modified from http://www.voidware.com/moon_phase.htm

    */

    if ($month < 3)

    {

        $year--;

        $month += 12;

    }

    ++$month;

    $c = 365.25 * $year;

    $e = 30.6 * $month;

    $jd = $c + $e + $day - 694039.09;	//jd is total days elapsed

    $jd /= 29.5305882;					//divide by the moon cycle

    $b = (int) $jd;						//int(jd) -> b, take integer part of jd

    $jd -= $b;							//subtract integer part to leave fractional part of original jd

    $b = floor($jd * 8);				//scale fraction from 0-8 and round

    if ($b >= 8 )

    {

        $b = 0;//0 and 8 are the same so turn 8 into 0

    }

    switch ($b)

    {

        case 0:

            return 'New Moon';

            break;

        case 1:

            return 'Waxing Crescent Moon';

            break;

        case 2:

            return 'Quarter Moon';

            break;

        case 3:

            return 'Waxing Gibbous Moon';

            break;

        case 4:

            return 'Full Moon';

            break;

        case 5:

            return 'Waning Gibbous Moon';

            break;

        case 6:

            return 'Last Quarter Moon';

            break;

        case 7:

            return 'Waning Crescent Moon';

            break;

        default:

            return 'Error';

    }

}

$timestamp = time();

return moon_phase(date('Y', $timestamp), date('n', $timestamp), date('j', $timestamp));
