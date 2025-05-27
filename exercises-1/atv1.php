<?php
class Person {


    public function __construct(   
        private $name,
        private $age,
        private $dayBirth,
        private $mouthBirth,
        private $yearBirth
    ) {}

    public function calculateDate(){}

    public function informDate(){}

    public function informName(){}

    public function adjustBirthDate(){}
}

$person1 = new Person(1, 1, 1, 1, 1);
$person2 = new Person(1, 1, 1, 1, 1);