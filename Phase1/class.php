<?php

class Dog {
    public $name;
    public $breed;

    public function __construct($name, $breed) {
        $this->name = $name;
        $this->breed = $breed;
    }

    public function bark() {
        return "Woof! My name is {$this->name} and I am a {$this->breed}.";
    }
}





?>