<?php

/**
 * Defines the essential operations for a bank account.
 */
interface AccountInterface
{

    /**
     * Assigns an account number to the account.
     *
     * @param string $accountNumber The unique identifier for the account.
     */
    public function setAccountNumber($accountNumber);

    /**
     * Deposits a specified amount into the account.
     *
     * @param float $amount The amount to be deposited.
     */
    public function addDeposit($amount);

    /**
     * Withdraws a specified amount from the account.
     *
     * @param float $amount The amount to be withdrawn.
     */
    public function addWithdrawal($amount);

    /**
     * Returns the current balance of the account.
     *
     * @return float The current account balance.
     */
    public function getBalance();
}
