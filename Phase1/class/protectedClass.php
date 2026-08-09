<?php


class Animal
{
    protected string $name;

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

class Dog extends Animal
{
    public function showName(): string
    {
        return $this->name;
    }
}

$dog = new Dog();

$dog->setName("Buddy");

echo $dog->showName();

?>