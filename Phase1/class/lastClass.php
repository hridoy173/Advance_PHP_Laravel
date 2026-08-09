<?php

class Employee
{
    private string $name;
    private float $salary;

    public function __construct(
        string $name,
        float $salary
    ) 
    {
        $this->name = $name;
        $this->setSalary($salary);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function setSalary(float $salary): void
    {
        if ($salary < 0) {
            throw new InvalidArgumentException(
                'Salary cannot be negative.'
            );
        }

        $this->salary = $salary;
    }

    public function increaseSalary(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException(
                'Increase must be greater than zero.'
            );
        }

        $this->salary += $amount;
    }
}

    $employee = new Employee(
        'Hridoy',
        30000
    );

    $employee->increaseSalary(5000);

    echo $employee->getSalary();