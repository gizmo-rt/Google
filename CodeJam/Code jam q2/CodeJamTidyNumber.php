<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 8/4/17
 * Time: 8:36 PM
 */

/**
 * 101
 * 110  99
 * 1010 999
 * 100001
 * 2304
 * 13954
 * 1299
 * 1101
 *
 *
 *
 * 1056
 * 4198
 * 4213
 *
 */

function abc($n)
{

    if ($n < 10)
        return $n;

    $numArr = str_split($n);
    $len = strlen($n);
    if(($n>=10)&&($n<=100)){
        if($numArr[0] > $numArr[1]){
            return $n - (($n%10)+1);
        }
        else{
            return $n;
        }
    }

    $status=true;
    for($i=1;$i<strlen($n);$i++){
        if($numArr[$i-1] > $numArr[$i])
            $status = false;
    }

    if($status)
        return $n;



    if($numArr[0] > $numArr[1]){
        return (int)(($numArr[0]-1).generateNumNine($len-1,""));
    }
    else{

        if($numArr[1] > $numArr[2]){
            return (int)($numArr[0].($numArr[1]-1).generateNumNine($len-2,""));
        }
    }
    print "got";
    if($numArr[2] > $numArr[3]){
        return (int)($numArr[0].$numArr[1].($numArr[2]-1).generateNumNine($len-3,""));
    }


}

function generateNumNine($l,$x){
    if($l ==0)
        return $x;
    else{
        return generateNumNine($l-1,$x."9");
    }
}

/**
 * prev num all equal
 */

$ab = abc(1121);//121,232,451,454,453,561,564,981,441,7785,5662,5674,1231,5552
print $ab;