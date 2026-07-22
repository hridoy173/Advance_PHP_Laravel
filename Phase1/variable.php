<?php
declare(strict_types=1);

// // variable = value


// $name = "Shekh Hridoy";

// echo $name;

// echo "<br>";


// // refference variable

// $name = "Shekh Hridoy";
// $username = &$name;
// $username = "As Hridoy";

// echo $name;

// echo "<br>";


//Garbage Collection

// $fname = "Shekh Hridoy";

// unset($fname);

// echo $fname; // error because variable is unset

// class User {
//     public $name = "Shekh Hridoy";
// }

// $user = new User();

// unset($user);

// echo $user; // error because variable is undefined


//Type Juggling

$x = 10; // integer
$y = "10"; // string

echo ($x + $y); // 20 (integer) because PHP automatically converts the string to an integer
echo "<br>";

function add(int $a, int $b) {
    return $a + $b;
}

echo add(10, $x); 
echo "<br>";

?>