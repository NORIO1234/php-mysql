<?php

 $sports = array("Football", "BAsketball", "Voleyball", "a", "s", "c");


    $sports2 = ["Football", "BAsketball", "Voleyball"];


    echo $sports[2]."<hr>";

    echo end(array: $sports)."<hr>";

    echo count($sports)."<hr>";


    for($count=0; $count<6; $count++){
        echo $sports[$count]."<hr>";
    }

    array_push($sports, "Tennis", "Baseball");
   
        for($count=0; $count<7; $count++){
        echo $sports[$count]."<hr>";
    }

    array_pop($sports);

    var_dump($sports);

    array_unshift($sports, "Tennis", "Baseball");

    var_dump($sports);

    array_shift($sports);

    var_dump($sports);

    $numbers = [1,2,3,4,5,6,7,8,9,];

    $mbledhja =  array_sum($numbers);

    echo $mbledhja."<hr>";


?>