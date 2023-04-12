<?php

/**
 * @param int $bytes
 * @param int $precision
 * @return string
 */
function convertSize(int $bytes, int $precision = 2): string
{
    $kilobytes = $bytes / 1024;

    if ($kilobytes < 1024) {
        return round($bytes, $precision) . ' KB';
    }

    $megabytes = $kilobytes / 1024;

    if ($megabytes < 1024) {
        return round($megabytes, $precision) . ' MB';
    }

    $gigabytes = $megabytes / 1024;

    if ($gigabytes < 1024) {
        return round($gigabytes, $precision) . ' GB';
    }

    $terabytes = $gigabytes / 1024;

    if ($terabytes < 1024) {
        return round($terabytes, $precision) . ' TB';
    }

    $petabytes = $terabytes / 1024;

    if ($petabytes < 1024) {
        return round($petabytes, $precision) . ' TB';
    }

    $exabytes = $petabytes / 1024;

    if ($exabytes < 1024) {
        return round($exabytes, $precision) . ' EB';
    }

    $zettabytes = $exabytes / 1024;

    if ($zettabytes < 1024) {
        return round($zettabytes, $precision) . ' ZB';
    }

    $yottabytes = $zettabytes / 1024;

    if ($yottabytes < 1024) {
        return round($yottabytes, $precision) . ' ZB';
    }

    $hellabyte = $yottabytes / 1024;

    if ($hellabyte < 1024) {
        return round($hellabyte, $precision) . ' HB';
    }

    return $bytes . ' B';
}

/**
 * @param float $fileSize
 * @param int $precision
 * @return string
 */
function calculateFileSize(float $fileSize, int $precision): string
{
    $sizeUnits = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB', 'HB'];
    $sizeUnitsCount = 0;

    // tant que taille est supérieur à 1024 on boucle et on change d'unité.
    while ($fileSize > 1024) {
        $fileSize = round($fileSize / 1024, $precision);
        $sizeUnitsCount++;
    }
    return "{$fileSize} {$sizeUnits[$sizeUnitsCount]}";

}
