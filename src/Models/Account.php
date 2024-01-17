<?php

require_once __DIR__ . '/../Interfaces/AccountInterface.php';

/**
 * Class Account
 * 
 * Represents a bank account.
 */
class Account implements AccountInterface
{
    /**
     * @var string The account number of the bank account.
     */
    private $accountNumber;

    /**
     * @var float The current balance of the bank account.
     */
    private $balance = 0;

    /**
     * @var array An array to track the history of transactions (deposits and withdrawals).
     */
    private $transactions = [];

    /**
     * Sets the account number for this bank account.
     *
     * @param string $accountNumber The account number to set.
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * Gets the account number of this bank account.
     *
     * @return string The account number.
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Adds a deposit to the bank account and updates the balance and transaction history.
     *
     * @param float $amount The amount to deposit.
     */
    public function addDeposit($amount)
    {
        $this->balance += $amount;
        $this->transactions[] = ['type' => 'deposit', 'amount' => $amount];
    }

    /**
     * Adds a withdrawal to the bank account, updates the balance, and records the transaction.
     *
     * @param float $amount The amount to withdraw.
     *
     * @throws Exception If there are insufficient funds for the withdrawal.
     */
    public function addWithdrawal($amount)
    {
        if ($this->balance < $amount) {
            throw new Exception("Insufficient balance.");
        }
        $this->balance -= $amount;
        $this->transactions[] = ['type' => 'withdrawal', 'amount' => $amount];
    }

    /**
     * Gets the current balance of the bank account.
     *
     * @return float The current balance.
     */
    public function getBalance()
    {
        return $this->balance;
    }
}
