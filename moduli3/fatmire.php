<?php
$var = 10;

if ($var > 0) {
    echo "$var is grater than 0 <hr>";
}

$age = 16;

if ($age >= 18) {
    echo "You can vote. <hr>";
} else {
    echo "You cant vote. <hr>";
}

$a = 50;
$b = 10;

if ($a == $b) {
    echo "$a is equal to $b <hr>";
}
 else if ($a > $b) {
    echo "$a is greater than $b <hr>";
}
 else {
    echo "$a is less than $b <hr>";
}

switch ($age) {
    case ($age >= 0 && $age<18):
        echo "You are a minor. <hr>";
        break;
    case ($age >= 18 && $age<=25):  
        echo "You are a young adult. <hr>";
        break;
    case ($age > 25) && ($age<65):
        echo "You are a middle age. <hr>";
        break;
    case ($age >= 65):
        echo "You are a senior citizen. <hr>";
        break;
    default:
        echo "Invalid age. <hr>";
    break;    
    }

    $number = 1;

    while($number<= 500) {
        echo "The number is $number <hr>";
        $number+=5;
}

$z = 1;
do {
    echo "The number is $z <hr>";
    $z+=1;
} while ($z <= 5);

?>
