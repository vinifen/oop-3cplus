<?php 
require_once 'atv1.php';
class University {
    private $name;

    function __construct($name) {
        $this->name = $name;
    }

    public function informName(){
        return $this->name;
    }
}

$utfpr = new University("utfpr");
$person = new Person("jorge", 20, 12, 2004, $utfpr);
$person->calculateDate(20, 12, 2025);

