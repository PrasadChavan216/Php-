<?php

    function sumMarks($arr){
        $sum = 0;
        foreach ($arr as $value) {
            $sum += $value;
        }
        return $sum;
    }

    $prasad = [85,82,96,95,99];
    $marks = sumMarks($prasad);

    echo "Marks of Prasad = $marks <br>";

?>