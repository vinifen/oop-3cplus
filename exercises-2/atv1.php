<?php
class Employee {
    public function __construct(private $id, private $name, private $position) {}

    public function calculatePayment(){
        return 3000;
    }
}

class Maneger extends Employee{
    public function __construct(private $id, private $name, private $numberOfEmployees) {
        parent::__construct($id, $name, "Maneger");
    }

    public function calculatePayment(){
        return 3000 + ($this->numberOfEmployees * 20);
    }
}

$carlos = new Employee(1, "Carlos", "cleaner");
echo $carlos->calculatePayment() . PHP_EOL;
$roberto = new Maneger(1, "Roberto", 12);
echo $roberto->calculatePayment() . PHP_EOL;