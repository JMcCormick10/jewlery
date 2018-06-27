<?php

$year  = date('Y');$month = date('m');$day = date('d');

$moon_name = 'Yep';

$current_moon_phase = moon_phase($year, $month, $day);

switch ($current_moon_phase){

    case 'Full Moon':
        $moon_name     = 'full_moon';
        $moon_name_con = 'full_moon_con';
        break;
    case 'New Moon':
        $moon_name     = 'new_moon';
        $moon_name_con = 'new_moon_con';
        break;
    case 'Waxing Crescent Moon':
        $moon_name     = 'waxing_crescent';
        $moon_name_con = 'waxing_crescent_con';
        break;
    case 'Quarter Moon':
        $moon_name     = 'first_quarter';
        $moon_name_con = 'first_quarter_con';
        break;
    case 'Waxing Gibbous Moon':
        $moon_name     = 'waxing_gibbous';
        $moon_name_con = 'waxing_gibbous_con';
        break;
    case 'Waning Gibbous Moon':
        $moon_name     = 'waning_gibbous';
        $moon_name_con = 'waning_gibbous_con';
        break;
    case 'Last Quarter Moon':
        $moon_name     = 'last_quarter';
        $moon_name_con = 'last_quarter_con';
        break;
    case 'Waning Crescent Moon':
        $moon_name     = 'waning_gibbous';
        $moon_name_con = 'waning_gibbous_con';
        break;
    default:
        break;
}

$moon_details = get_field($moon_name,'option');
$moon_content = get_field($moon_name_con,'option');



?>
<?php var_dump($current_moon_phase) ?>
<article class="moon_phase">
    <div class="inner-wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 flex-lg-last flex-first">
                    <img class="basic-section-image" src="<?php echo $moon_details['url'];?>" alt=""/>
                </div>
                <div class="col-lg-6 col-12">
                    <h2 class="section-title">Current Moon Phase</h2>
                    <div class="section-content">
                        <?php echo $moon_content ;?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</article>
</section>