<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 8/4/17
 * Time: 10:55 PM
 */

function pancakes(){
    $file = fopen('A-large.in', 'r');
    $T = trim(fgets($file));
    $fout = fopen("A-large.out", "w");
    $index=1;

    for($i=0;$i<$T;$i++){
        $temp = trim(fgets($file));
        $inp = explode(" ",$temp);
        $data = "Case #".$index.": ".moves($inp[0],$inp[1])."\n";
        fwrite($fout, $data);
        $index++;
    }


    fclose($file);
    fclose($fout);
}

function moves($pancakes,$flipLength){

    $numOfAttempts = strlen($pancakes);
    $flipCount=0;
    $expected = generatePancake(strlen($pancakes),'');
    while($numOfAttempts>0){
        $pos = strpos($pancakes, '-');
        if($pos === false){
            return 0;
        }
        if($pos+$flipLength > strlen($pancakes)){
            return "IMPOSSIBLE";
        }
        $pancakes = flipProduct($pancakes,$flipLength,$pos);
        $flipCount++;
        if(strcmp($pancakes,$expected)==0)
            return $flipCount;
        $numOfAttempts--;
    }
    return $flipCount;
}

function flipProduct($pancakes,$flipLength,$pos){

    for($i=$pos;$i<($flipLength+$pos);$i++){
        if($pancakes[$i] == '-')
            $pancakes[$i] = '+';
        else
            $pancakes[$i] = '-';
    }
    return $pancakes;
}

function generatePancake($l,$x){

    $x='';
    for($i=0;$i<$l;$i++){
        $x.='+';
    }
    return $x;
}


pancakes();