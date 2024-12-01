<?php
echo "WELCOME TO PHP BANK MANAGEMENT SYSTEM\n";
echo "Select your role:\n";
echo "1) Banker\n";
echo "2) Customer\n";
echo "3) Exit\n";
echo "Choose your role: ";

// Get user input for role
$handle = fopen("php://stdin", "r");
$role = trim(fgets($handle));

// Array to store customer details
$customers = [];

switch ($role) {
    case 1: 
        echo "Welcome to Banker's App!\n";

        do {
            echo "Operations Menu:\n";
            echo "1) Add Customer\n";
            echo "2) View Customer\n";
            echo "3) Search Customer\n";
            echo "4) View All Customers\n";
            echo "5) Total Amounts in Bank\n";
            echo "Enter operation which you want to perform: ";

            $operation = trim(fgets($handle));

            switch ($operation) {
                case 1:
                    echo "Enter Account Number: ";
                    $accountNo = trim(fgets($handle));

                    echo "Enter Customer Name: ";
                    $customerName = trim(fgets($handle));

                    echo "Enter Opening Balance: ";
                    $openingBalance = trim(fgets($handle));

                    // Add customer to the array
                    $customers[] = [
                        'account_no' => $accountNo,
                        'name' => $customerName,
                        'balance' => (float)$openingBalance
                    ];

                    echo "Customer added successfully!\n";
                    break;

                case 2:
                    echo "Enter Account Number to view details: ";
                    $searchAccountNo = trim(fgets($handle));

                    $found = false;
                    foreach ($customers as $customer) {
                        if ($customer['account_no'] === $searchAccountNo) {
                            echo "Customer Details:\n";
                            echo "Account No: " . $customer['account_no'] . "\n";
                            echo "Name: " . $customer['name'] . "\n";
                            echo "Balance: " . $customer['balance'] . "\n";
                            $found = true;
                            break;
                        }
                    }

                    if (!$found) {
                        echo "Customer not found.\n";
                    }
                    break;

                case 3:
                    echo "Enter Customer Name to search: ";
                    $searchName = trim(fgets($handle));

                    $found = false;
                    foreach ($customers as $customer) {
                        if (stripos($customer['name'], $searchName) !== false) {
                            echo "Customer Details:\n";
                            echo "Account No: " . $customer['account_no'] . "\n";
                            echo "Name: " . $customer['name'] . "\n";
                            echo "Balance: " . $customer['balance'] . "\n";
                            $found = true;
                        }
                    }

                    if (!$found) {
                        echo "No customers matched your search.\n";
                    }
                    break;

                case 4:
                    if (empty($customers)) {
                        echo "No customers available.\n";
                    } else {
                        echo "All Customers:\n";
                        foreach ($customers as $customer) {
                            echo "Account No: " . $customer['account_no'] . "\n";
                            echo "Name: " . $customer['name'] . "\n";
                            echo "Balance: " . $customer['balance'] . "\n";
                            echo "----------------------\n";
                        }
                    }
                    break;

                case 5:
                    $totalBalance = 0;
                    foreach ($customers as $customer) {
                        $totalBalance += $customer['balance'];
                    }
                    echo "Total Amount in Bank: " . $totalBalance . "\n";
                    break;

                default:
                    echo "Invalid operation selected. Please try again.\n";
                    break;
            }

            echo "Do you want to perform more operations? (y/n): ";
            $moreOperations = trim(fgets($handle));
        } while (strtolower($moreOperations) === 'y');
        break;

    case 2:
        echo "Welcome to Customer's App!\n";

        do {
            echo "Operations Menu:\n";
            echo "1) Withdraw Amount\n";
            echo "2) Deposit Amount\n";
            echo "3) View Balance\n";
            echo "Enter operation which you want to perform: ";

            $operation = trim(fgets($handle));

            echo "Enter Account Number: ";
            $accountNo = trim(fgets($handle));

            $found = false;
            foreach ($customers as &$customer) {
                if ($customer['account_no'] === $accountNo) {
                    $found = true;

                    // Withdraw Amount
                    switch ($operation) {
                        case 1: 
                            echo "Enter amount to withdraw: ";
                            $amount = (float)trim(fgets($handle));

                            if ($amount > $customer['balance']) {
                                echo "Insufficient balance. Transaction failed.\n";
                            } else {
                                $customer['balance'] -= $amount;
                                echo "Withdrawal successful. Remaining balance: " . $customer['balance'] . "\n";
                            }
                            break;

                            // Deposit Amount
                        case 2: 
                            echo "Enter amount to deposit: ";
                            $amount = (float)trim(fgets($handle));

                            $customer['balance'] += $amount;
                            echo "Deposit successful. Current balance: " . $customer['balance'] . "\n";
                            break;

                            // View Balance
                        case 3: 
                            echo "Current balance: " . $customer['balance'] . "\n";
                            break;

                        default:
                            echo "Invalid operation selected. Please try again.\n";
                            break;
                    }
                    break;
                }
            }

            if (!$found) {
                echo "Customer not found.\n";
            }

            echo "Do you want to perform more operations? (y/n): ";
            $moreOperations = trim(fgets($handle));
        } while (strtolower($moreOperations) === 'y');
        break;

    case 3:
        echo "Exiting the system. Goodbye!\n";
        break;

    default:
        echo "Invalid role selected. Please try again.\n";
        break;
}

fclose($handle);
?>
