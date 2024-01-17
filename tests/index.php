<?php

require_once __DIR__ . '/../src/Models/Bank.php';
require_once __DIR__ . '/../src/Models/Account.php';

// Test 1: Bank Postal Address
$bank = new Bank();
$bank->setBankName('JOE & THE BANK');
$bank->setAddress("Joe Street,\nCopenhagen");
$postalAddress = $bank->getPostalAddress();
echo "Test 1: " . ($postalAddress === "JOE & THE BANK\nJoe Street,\nCopenhagen" ? "Passed" : "Failed") . "\n";


// Test 2: Add Bank Accounts
$account1 = new Account();
$account1->setAccountNumber('ab01');
$account2 = new Account();
$account2->setAccountNumber('qj42');
$bank->addBankAccount($account1);
$bank->addBankAccount($account2);
echo "Test 2: " . (count($bank->getAccounts()) === 2 ? "Passed" : "Failed") . "\n";

// Test 3: Internal Transaction
$account1->addDeposit(500); // Deposit some amount to account1
$bank->doInternalTransaction($account1, $account2, 100);
echo "Test 3: " . ($account1->getBalance() === 400 && $account2->getBalance() === 100 ? "Passed" : "Failed") . "\n";
