<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 8/4/17
 * Time: 11:49 PM
 */


function processData(){

    $file = fopen('B-large.in', 'r');
    $T = trim(fgets($file));
    $fout = fopen("B-large.out", "w");
    $index=1;
    for($i=0;$i<$T;$i++){
        $inp = trim(fgets($file));
        $data = "Case #".$index.": ".createTidy($inp)."\n";
        fwrite($fout, $data);
        $index++;
    }

    fclose($file);
    fclose($fout);

}

function createTidy($n){

    if ($n < 10)
        return $n;

    $numArr = str_split($n);
    $len = strlen($n);
    $i=1;
    while($i < $len){
        if($numArr[$i-1] > $numArr[$i]){
            $numArr=createNumber($i,$numArr,$len);
            $i/=$i;
        }
        else{
            $i++;
        }

    }
    return (int)implode($numArr);
}


function createNumber($i,$numArr,$len){

    $numArr[$i-1]=$numArr[$i-1]-1;
    for($j=$i;$j<$len;$j++){
        $numArr[$j] = 9;
    }

    return $numArr;
}

processData();