<?php

/**
 * Interface for bank operations.
 * 
 * Defines the essential operations that a bank should support, including
 * setting bank details, managing bank accounts, and handling internal transactions.
 */
interface BankInterface
{

    /**
     * Sets the name of the bank.
     * 
     * @param string $name The name of the bank.
     */
    public function setBankName($name);

    /**
     * Sets the address of the bank.
     * 
     * @param string $address The physical address of the bank.
     */
    public function setAddress($address);

    /**
     * Adds a bank account to the bank.
     * 
     * @param AccountInterface $account The account to be added to the bank.
     */
    public function addBankAccount(AccountInterface $account);

    /**
     * Retrieves the postal address of the bank.
     * 
     * @return string The postal address, composed of the bank's name and address.
     */
    public function getPostalAddress();

    /**
     * Performs a transaction between two accounts within the bank.
     * 
     * @param AccountInterface $source The source account for the transaction.
     * @param AccountInterface $destination The destination account for the transaction.
     * @param float $amount The amount to be transferred.
     */
    public function doInternalTransaction(AccountInterface $source, AccountInterface $destination, $amount);
}
