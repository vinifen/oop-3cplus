<?php
require_once 'atv2.php';

class Person {
    private $age;

    public function __construct(
        private $name,
        private $dayBirth,
        private $mouthBirth,
        private $yearBirth,
        private University $university
    ) {}

    public function calculateDate($day, $mouth, $year) {
        $age = $year - $this->yearBirth;
        if($mouth < $this->mouthBirth || ($mouth == $this->mouthBirth && $day < $this->dayBirth)){
            $age--;
        }
        $this->age = $age;
    }

    public function informDate() {
        return $this->age;
    }

    public function informName() {
        return $this->name;
    }

    public function adjustBirthDate($day, $mouth, $year) {
        $this->dayBirth = $day;
        $this->mouthBirth = $mouth;
        $this->yearBirth = $year;
    }

    public function inform() {
        $university = $this->university->informName();
        return [
            "name" => $this->name,
            "university" => $university,
            "age" => $this->age
        ];
    }
}

$utfpr = new University("UTFPR");
$person1 = new Person("Carlos", 1, 1, 2010, $utfpr);
$person1->calculateDate(28, 5, 2025);

echo "Idade: " . $person1->informDate() . PHP_EOL;
echo "Nome: " . $person1->informName() . PHP_EOL;

$person1->adjustBirthDate(21, 11, 2000);
$person1->calculateDate(28, 5, 2025);
echo "Nova Idade: " . $person1->informDate() . PHP_EOL;

print_r($person1->inform());