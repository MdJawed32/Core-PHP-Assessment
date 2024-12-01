# Core-PHP-Assessment
**PHP Bank Management System**

This is a simple PHP-based command-line Bank Management System that allows users to operate in two roles:

**Banker**: Manage customer accounts, view details, and check total bank balances.

![image alt](https://github.com/MdJawed32/Core-PHP-Assessment/tree/4c94495d93c63f5eabc8f4679d24ca678c329633/images)

**Customer**: Perform transactions such as withdrawal, deposit, and balance inquiry.

**Features**
**Banker Role**
Add a new customer with account number, name, and opening balance.
View specific customer details by account number.
Search for a customer by name.
View all customers and their account details.
Calculate the total balance across all accounts.

**Customer Role**
Withdraw funds from an account (checks for sufficient balance).
Deposit funds into an account.
Check the account balance.

**Prerequisites**
PHP CLI installed on your system.
Basic knowledge of PHP and command-line interface.
Code Breakdown with References
The following PHP features and functions are used in the implementation:

**1. Input Handling**
fopen(): Opens a stream for reading user input from the command line.
MDN Reference for fopen()
fgets(): Reads a line from the stream.
MDN Reference for fgets()
trim(): Removes whitespace or other predefined characters from the start and end of a string.
MDN Reference for trim()

**2. Data Storage**
Associative Arrays: Customer details are stored in an array with keys like account_no, name, and balance.
MDN Reference for PHP Arrays

**3. Loops and Conditional Statements**
foreach: Iterates through the array of customers to find or display information.
MDN Reference for foreach
switch: Used for menu-based role selection and operation handling.
MDN Reference for switch
do-while: Ensures the menu is displayed until the user decides to exit.
MDN Reference for do-while

**4. String Operations**
stripos(): Performs a case-insensitive search for a string within another string.
MDN Reference for stripos()

**5. Arithmetic and Data Processing**
Mathematical Operations: Used for balance management (withdrawals, deposits, and total calculations).
MDN Reference for Arithmetic Operators

**6. Input Validation and Error Handling**
Checks for invalid inputs, insufficient balance, and non-existent accounts.
Running the Program
Copy the PHP script to a file named bank_management_system.php.
Open a terminal and navigate to the directory containing the file.

