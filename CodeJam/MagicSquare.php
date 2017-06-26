<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 9/4/17
 * Time: 2:26 PM
 *
 *
 * square.in->1
 */

function processData(){

    $file = fopen('square.in', 'r');
    $rowSize = trim(fgets($file));
    $colSize = trim(fgets($file));
    $matrix = array();
    $magicConstant =(int) (sqrt($rowSize) * ($rowSize+ 1)) / 2;

    if($rowSize != $colSize)
        return 0;


    for($i=0;$i<$rowSize;$i++){
      $matrix[$i]=explode(" ",trim(fgets($file)));

      if(array_sum($matrix[$i]) > $magicConstant)
          return 0;
    }


    $magicSize = (int)sqrt($rowSize);
    $pos =1;
    $availableSum=0;
    for($i=0;$i<$rowSize;$i++){
        $rowSum = array_sum($matrix[$i]);
        $availableSum = $magicConstant - $rowSum;
        for($j=0;$j<$rowSize;$j++){
            $pos++;
            if($matrix[$i][$j] == 0){

                checkSquare();
                checkRow();
                checkCol();

            }
        }
    }



    fclose($file);

}


processData();