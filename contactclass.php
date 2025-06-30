<?php

//class Contact{
//    private $name;
//    private $surname;
//    private $email;
//    private $phone;
//    private $address;
//    function __construct($name, $surname, $email, $phone, $address)
//    {$this->name=$name;
//    $this->surname=$surname;
//    $this->email=$email;
//    $this->phone=$phone;
//    $this->address=$address;
//    }
//
//}
//



// Створення обʼєкта через method chaining:
class Contact
{
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $address;


    public function __construct()
    {
    }

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function surname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    public function email($email)
    {
        $this->email = $email;
        return $this;
    }

    public function phone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function address($address)
    {
        $this->address = $address;
        return $this;
    }

    public function build()
    {
        return $this;
    }

// test:
    public function display()
    {
        echo "Name: $this->name\n";
        echo "Surname: $this->surname\n";
        echo "Email: $this->email\n";
        echo "Phone: $this->phone\n";
        echo "Address: $this->address\n";
    }
}

$contact = (new Contact())
    ->phone('000-555-000')
    ->name("John")
    ->surname("Snow")
    ->email("john@snow.com")
    ->address("123 Main St, Winterfell")
    ->build();


$contact->display();
