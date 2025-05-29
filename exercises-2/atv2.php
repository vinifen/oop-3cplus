<?php

abstract class Objectt {
    public function __construct(private $width, private $height) {}

    abstract function calculateArea();

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }
}

class Triangle extends Objectt {
    public function __construct(private $width, private $height, private $type) {
        parent::__construct($width, $height);
    }

    public function calculateArea() {
        return ($this->getWidth() * $this->getHeight()) / 2;
    }
}

class Rectangle extends Objectt {
    public function __construct(private $width, private $height) {
        parent::__construct($width, $height);
    }

    public function isSquare(): bool {
        return $this->width == $this->height;
    }

    public function calculateArea() {
        return $this->getWidth() * $this->getHeight();
    }
}

$triangule = new Triangle(10, 20, "triangule");
echo $triangule->calculateArea() . PHP_EOL;
$square = new Rectangle(10, 10);
echo $square->isSquare() . PHP_EOL;
echo $square->calculateArea() . PHP_EOL;