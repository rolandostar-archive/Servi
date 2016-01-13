<?php

function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    if($hours == 00) return sprintf('%02dm', $minutes);
    else return sprintf($format, $hours, $minutes);
}

?>