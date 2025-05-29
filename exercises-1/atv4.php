<?php

class Book {
    private bool $availability = true;
    private Person $person_rented;

    public function __construct(    
        private string $name,
        private string $author,
        private int $pagesNumber,
    ) {}
    
    public function rent(Person $person)
    {
        if (!$this->availability) {
            return false;
        }
        $this->person_rented = $person;
        $this->availability = false;
        return true;
    } 

    public function replace(){
        unset($this->person_rented);
        $this->availability = true;
    }

    public function inform(){
        return [
            "person" => [
                "name" => $this->person_rented->getName(),
                "address" => $this->person_rented->getAddress(),
                "email" => $this->person_rented->getEmail(),
                "phone" => $this->person_rented->getPhone(),
            ], 
            "name" => $this->name, 
            "availability" => $this->availability
        ];
    }
}

class Person {
    public function __construct(
        private string $name,
        private string $address,
        private string $email,
        private string $phone,
    ) {}

    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPhone(): string {
        return $this->phone;
    }
}


$george = new Person("George", "adf street, 1233", "email@email.com", "12312312");
$book1984 = new Book ("1984", "George Orwel", 130);
$book1984->rent($george);
var_dump($book1984->inform());