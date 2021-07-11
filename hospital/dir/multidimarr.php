<?php

// echo "This is multi dim array";

$arr = array(array(
        array(1,2,3,4),
        array(4,3,2,1),
        array(5,6,7,8)
    ));

// echo var_dump($arr);

// for ($i=0   ; $i < count($arr) ; $i++  ) { 
//     echo var_dump($arr[$i]);
//     echo "<br>";
// }


for ($i=0; $i < count($arr); $i++) { 
    for ($j=0; $j <count($arr[$i]) ; $j++) { 
        for ($k=0; $k < count($arr[$i][$j]); $k++) { 
            echo $arr[$i][$j][$k];
            echo " ";
        }
        echo "<br>";
    }
}


?>