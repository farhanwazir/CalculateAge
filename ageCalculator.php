
function ageCalculator(DateTime $born, $format = 'full'){
    $now = new DateTime;

    $diff = $now->diff($born);

    $total_days = $diff->days;
    $total_months = ($diff->y * 12) + $diff->m;
    $total_years = $diff->y;

    // Not very readable, but all it does is joining age
    // parts using either ',' or 'and' appropriately
    switch($format){
        case 'full':
            $age = ($d = $diff->d) ? ' and '. ngettext('%d day', '%d days', $d) : '';
            $age = ($m = $diff->m) ? ($age ? ', ' : ' and '). ngettext('%d month', '%d months', $m).$age : $age;
            $age = ($y = $diff->y) ? ngettext('%d year', '%d years', $y).$age  : $age;
            break;
        case 'M':
            $age = $total_months . ' ' . ngettext('%d month', '%d months', $total_months);
            break;
        case 'D':
            $age = $total_days . ' ' . ngettext('%d day', '%d days', $total_days);
            break;
        case 'Y':
            $age = $total_years . ' ' . ngettext('%d year', '%d years', $total_years);
            break;
        case 'm':
            $age = $total_months;
            break;
        case 'd':
            $age = $total_days;
            break;
        case 'y':
            $age = $total_years;
            break;
        default:
            $age = str_replace(['%y', '%m', '%d'], [$diff->y, $diff->m, $diff->d], str_replace(['%Y', '%M', '%D'], [ngettext('%d year', '%d years', $diff->y), ngettext('%d month', '%d months', $diff->m), ngettext('%d day', '%d days', $diff->d)], $format));
            break;
    }
    return $age;
}
