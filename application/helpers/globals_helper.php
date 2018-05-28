<?php

/**
 * Get Human Date
 * @param long $time Unix timestamp
 * @return string
 */
function time_since($time) {
    $chunks = array(
        array(60 * 60 * 24 * 365, 'tahun'),
        array(60 * 60 * 24 * 30, 'bulan'),
        array(60 * 60 * 24 * 7, 'minggu'),
        array(60 * 60 * 24, 'hari'),
        array(60 * 60, 'jam'),
        array(60, 'menit'),
    );

    $now = (time() > $time) ? time() : $time;
    $since = $now - $time;
    $day_left = $now - strtotime(date('Y-m-d', $now));
    $year_left = $now - strtotime(date(date('Y') . '-01-01 00:00:00 +0000', $now));

    if ($since > $day_left) { // before today 00:00
        if ($since <= $day_left + (24 * 60 * 60)) {
            return "Kemarin";
        }
        $print = date("j ", $time);
        $print .= date("F", $time);

        if ($since >= $year_left) {
            $print .= date(" Y", $time);
        }

        return $print;
    }

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];

        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    if ($count == 0) {
        $print = "baru saja";
    } else {
        $print = "$count {$name} yang lalu";
    }

    return $print;
}

function replace_newline($string) {
    $result = preg_replace("/[\n\r]/", "<br/>", $string);
    return $result;
}

function date_formater($date) {
    $result = explode(' ', $date);
    return $result[0] ." ". change_month($result[1]) ." ". $result[2];
}

function change_month($month) {
    switch ($month) {
        case 'January':
            return 'Januari';
            break;
        case 'February':
            return 'Februari';
            break;
        case 'March':
            return 'Maret';
            break;
        case 'April':
            return 'April';
            break;
        case 'May':
            return 'Mei';
            break;
        case 'June':
            return 'Juni';
            break;
        case 'July':
            return 'Juli';
            break;
        case 'August':
            return 'Agustus';
            break;
        case 'September':
            return 'September';
            break;
        case 'October':
            return 'Oktober';
            break;
        case 'November':
            return 'November';
            break;
        default:
            return 'Desember';
            break;
        }
}