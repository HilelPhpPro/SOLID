<?php

namespace EC2;

class Phone
{
    /**
     * @var string
     */
    protected  string $operator;

    public function __construct(protected string $number)
    {
        $this->validateNumber();
        $this->parseNumber();
    }

    protected function parseNumber()
    {
        // parse $this->number
        $this->operator = "097";
    }

    /**
     * @throws \Exception
     */
    protected function validateNumber()
    {
        // logic validate $this->number
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNumber();
    }
}

class PhonesBook
{
    // .....

    /**
     * @param Phone $phone
     * @throws \Exception
     */
    public static function checkAvailabilityPhone(Phone $phone)
    {
        return !in_array($phone->getNumber(), []);
    }

    // .....
}

class User
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var Phone
     */
    protected Phone $phone;

    /**
     * UserV1 constructor.
     * @param string $name
     * @param Phone $phone
     */
    public function __construct(string $name, Phone $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return (string)$this->phone;
    }
}

$phone = new Phone('0971112233');

PhonesBook::checkAvailabilityPhone($phone);

$user = new User('John Doe', $phone);
echo $user->getPhone();
