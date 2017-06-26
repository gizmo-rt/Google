<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 30/4/17
 * Time: 3:18 PM
 */


function processData()
{

    $file = fopen('A-small-attempt0.in', 'r');
    $T = trim(fgets($file));
    $fout = fopen("A-small-attempt0.out", "w");
    $index = 1;

    for ($i = 0; $i < $T; $i++) {
        $pancake = explode(" ", trim(fgets($file)));
        $list = processPancake($pancake[0], $file);
        rsort($list);
        $data = "Case #" . $index . ": " . calculate($pancake[1], $list) . "\n";
        fwrite($fout, $data);
        $list = '';
        $index++;
    }
    fclose($file);
}


function processPancake($l, &$file)
{

    $list = array();
    for ($j = 0; $j < $l; $j++) {
        $temp = explode(" ", trim(fgets($file)));
        $temp[0] = (double)$temp[0];
        $temp[1] = (double)$temp[1];
        $d  = ($temp[0] * ($temp[0] + 2 * $temp[1])) - $d;
        $list[]  = (double)M_PI * $d;
    }
    return $list;
}

function calculate($pkc, $list)
{

    $out = 0.0;
    for ($j = 0; $j < $pkc; $j++) {
        $out += $list[$j];
    }
    return number_format($out, 9, '.', '');
}

processData();