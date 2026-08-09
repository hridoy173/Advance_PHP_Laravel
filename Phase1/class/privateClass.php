<?php

class BankAccount
{
    private float $balance = 0;

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException(
                'Deposit must be greater than zero.'
            );
        }

        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException(
                'Withdrawal must be greater than zero.'
            );
        }

        if ($amount > $this->balance) {
            throw new RuntimeException(
                'Insufficient balance.'
            );
        }

        $this->balance -= $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}






?>