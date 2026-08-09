<?php


// readonly properties
class UserData
{
    public function __construct(
        public readonly int $id,
        public readonly string $email
    ) {
    }
}

$user = new UserData(1, 'hridoy@example.com');

echo $user->id;  
echo "<br>";
echo $user->email; // Output: hridoy@example.com

echo "<br>";


//Getters and Setters

class User
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

$obj = new User();
$obj->setName("Shekh Hridoy");

echo $obj->getName(); // Output: Shekh Hridoy