
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
            $age = ($d = $diff->d) ? ' and '.$d.' '.str_plural('day', $d) : '';
            $age = ($m = $diff->m) ? ($age ? ', ' : ' and ').$m.' '.str_plural('month', $m).$age : $age;
            $age = ($y = $diff->y) ? $y.' '.str_plural('year', $y).$age  : $age;
            break;
        case 'M':
            $age = $total_months . ' ' . str_plural('month', $total_months);
            break;
        case 'D':
            $age = $total_days . ' ' . str_plural('day', $total_days);
            break;
        case 'Y':
            $age = $total_years . ' ' . str_plural('year', $total_years);
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
            $age = str_replace(['%y', '%m', '%d'], [$diff->y, $diff->m, $diff->d], str_replace(['%Y', '%M', '%D'], [$diff->y . ' ' . str_plural('year', $diff->y), $diff->m . ' ' . str_plural('month', $diff->m), $diff->d . ' ' . str_plural('day', $diff->m)], $format));
            break;
    }
    return $age;
}
