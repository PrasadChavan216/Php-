<?php

    $name = "My name is prasad";

    echo $name;
    
    echo "<br>";
    echo "the length of string is ". strlen($name);
    
    echo "<br>";
    echo "the words in my string are = ".str_word_count($name);
    
    echo "<br>";
    echo "the reverse of string is = ". strrev($name);

    echo "<br>";
    echo "the position of \"is\" is = " . strpos($name, "is");

    echo "<br>";
    echo "Replace Prasad with \"Chavan\" = " . str_replace("prasad","Chavan", $name);

    // rtrim()
    // ltrim()
    
    echo "<br>";
    echo $name;

?>