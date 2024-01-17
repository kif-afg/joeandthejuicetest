<?php

require_once __DIR__ . '/../Interfaces/BankInterface.php';
require_once __DIR__ . '/../Interfaces/AccountInterface.php';

/**
 * Class Bank
 * 
 * Represents a bank with bank accounts.
 */
class Bank implements BankInterface
{
    /**
     * @var string The name of the bank.
     */
    private $bankName;

    /**
     * @var string The postal address of the bank.
     */
    private $address;

    /**
     * @var array An associative array of bank accounts, where the keys are account numbers.
     */
    private $accounts = [];

    /**
     * Sets the name of the bank.
     *
     * @param string $name The name of the bank.
     */
    public function setBankName($name)
    {
        $this->bankName = $name;
    }

    /**
     * Gets the accounts associated with the bank.
     *
     * @return array An array of bank accounts.
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * Sets the postal address of the bank.
     *
     * @param string $address The postal address of the bank.
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Adds a bank account to the bank.
     *
     * @param AccountInterface $account The bank account to add.
     */
    public function addBankAccount(AccountInterface $account)
    {
        $this->accounts[$account->getAccountNumber()] = $account;
    }

    /**
     * Gets the postal address of the bank, created from the bank name and address.
     *
     * @return string The postal address of the bank.
     */
    public function getPostalAddress()
    {
        return $this->bankName . "\n" . $this->address;
    }

    /**
     * Performs an internal transaction between two bank accounts in the bank.
     *
     * @param AccountInterface $source The source account for the transaction.
     * @param AccountInterface $destination The destination account for the transaction.
     * @param float $amount The amount to transfer.
     *
     * @throws Exception If one or both accounts are not found in the bank.
     */
    public function doInternalTransaction(AccountInterface $source, AccountInterface $destination, $amount)
    {
        if (!isset($this->accounts[$source->getAccountNumber()]) || !isset($this->accounts[$destination->getAccountNumber()])) {
            throw new Exception("One or both accounts not found in the bank.");
        }

        $source->addWithdrawal($amount);
        $destination->addDeposit($amount);
    }
}
