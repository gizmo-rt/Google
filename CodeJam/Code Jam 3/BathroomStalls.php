<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 9/4/17
 * Time: 12:54 AM
 */

function processData(){

    $file = fopen('C-small.in', 'r');
    $T = trim(fgets($file));
    $fout = fopen("C-small.out", "w");
    $index=1;
    for($i=0;$i<$T;$i++){
        $inp = explode(" ",trim(fgets($file)));
        $data = "Case #".$index.": ".initiateStall($inp[0],$inp[1])."\n";
        fwrite($fout, $data);
        $index++;
    }

    fclose($file);
    fclose($fout);
}

function initiateStall($stalls,$people){

    if($stalls%2 == 0){
        $lS = ($stalls)/2 -1;
        $rS = ($stalls)/2;
    }
    else{
        $lS = floor(($stalls)/2) ;
        $rS = ceil(($stalls)/2);
    }
    $occupantStatus=array();
    if($people == 1){
        return  max($lS,$rS)." ".min($lS,$rS);
    }
    if($stalls == $people)
        return "0 0";

    $occupantStatus[0]=$rS;

    for($i=2;$i<=$people;$i++){
        $res = compute($occupantStatus,$stalls,$i);
        $occupantStatus[] = $res[0];
    }

    return  max($res[1],$res[2])." ".min($res[1],$res[2]);

}

function compute($occupantStatus,$N,$i){
    sort($occupantStatus);
    $dist=array();
    $res=array();
    if($i ==2){
        $lS[0]=$occupantStatus[0]-2;
        $rS[0]=$N-$occupantStatus[0]-1;
        if($lS >= $rS){
            $res[0]=1;
        }
        else{
            $res[0]=$N;
        }
        $res[1]=$lS[0];
        $res[2] = $rS[0];
        return $res;
    }

//    for($i=1;$i<count($occupantStatus);$i++){
//        $lS[] = $occupantStatus[$i]-2;
//        $rS[] = $occupantStatus[$i] - $occupantStatus[$i-1];
//    }
//
//    foreach ($j=0;$j<count($lS);$j++){
//        $distMax[] = max($lS[$j],$rS[$j]);
//    }
//

    return $dist;
}


processData();
