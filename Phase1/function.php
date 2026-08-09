<?php


// global variable
global $name;

function test($name)
{
    echo $name;
}


// local variable
function test2()
{
    echo $age = 10;
    echo "<br>";
    test("As Hridoy");
}


test2();

echo "<br>";


// static variable
function counter()
{
    static $count = 0;

    $count++;

    echo $count . "<br>";
}

counter();
counter();
counter();


//anonymous function
$greet = function () {
    echo "Hello";
};

$greet();
echo "<br>";


//Closures
$name = "Hridoy";

$closure = function () use ($name) {
    echo "Hello {$name}";
};

$closure();
echo "<br>";


//Capture by Reference
$count = 0;

$increment = function () use (&$count) {
    $count++;
};

$increment();
$increment();

echo $count;  // here $count is 2 because it was captured by reference and modified within the closure
echo "<br>";


//Arrow Functions
$sum = function ($a, $b) {
    return $a + $b;
};

$sumArrow = fn($a, $b) => $a + $b;

echo $sumArrow(5, 10); // returns 15
echo "<br>";


//Callback Functions
function calculate($a, $b, callable $operation)
{
    return $operation($a, $b);
}

echo calculate(10, 5, fn($x, $y) => $x * $y);
echo "<br>";



//Higher-Order Functions
$numbers = [1, 2, 3, 4];

$result = array_map(
    fn($number) => $number * 2,
    $numbers
);

$numbersNew = [3,5,7, ...$numbers] ;

print_r($result);
echo "<br>";
print_r($numbersNew);