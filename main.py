accounts = [
    {
        'accountName': 'John Doe',
        'balance': 1000.0,
        'status': 'active',
        'cardNumber': 123456,
        'pin': 7890
    },
    {
        'accountName': 'Jane Smith',
        'balance': 5000.0,
        'status': 'active',
        'cardNumber': 987654,
        'pin': 4321
    },
    {
        'accountName': 'Alice Johnson',
        'balance': 2500.0,
        'status': 'inactive',
        'cardNumber': 246813,
        'pin': 1357
    }
]

admin = [
    {
        'username': 'admin',
        'password': 'admin'
    }
]


def verify_account():
    card_number = int(input("Enter your card number: "))
    pin = int(input("Enter your PIN: "))
    for account in accounts:
        if account['cardNumber'] == card_number and account['pin'] == pin:
            return account['cardNumber'], account['status']
    print("\nInvalid card number or PIN")
    return None, None


def deposit(card_number):
    for account in accounts:
        if account['cardNumber'] == card_number:
            amount = float(input("Enter the deposit amount: "))
            account['balance'] += amount
            print("\nDeposit successful!")
            return card_number, account['balance'], amount

    print("\nInvalid card number!")
    return None, None, None


def withdraw(card_number):
    for account in accounts:
        if account['cardNumber'] == card_number:
            amount = float(input("Enter the withdrawal amount: "))
            if amount <= account['balance']:
                account['balance'] -= amount
                print("\nWithdrawal successful!")
                return card_number, account['balance'], amount

    print("\nInvalid card number!")
    return None, None, None


def check_balance():
    card_no, status = verify_account()
    if card_no is not None:
        for account in accounts:
            if account['cardNumber'] == card_no:
                return account['balance']
    return None


def find_details(cardNumber):
    for account in accounts:
        if account['cardNumber'] == cardNumber:
            print("\nAccount Name:", account['accountName'])
            print("Balance:", account['balance'])
            print("Status:", account['status'])
            print("Card Number:", account['cardNumber'])
            print()


def all_account():
    for acc in accounts:
        print("\nAccount Name:", acc['accountName'])
        print("Balance:", acc['balance'])
        print("Status:", acc['status'])
        print("Card Number:", acc['cardNumber'])
        print()


def add_account():
    accountName = input("Enter account name: ")
    balance = float(input("Enter balance: "))
    cardNumber = int(input("Enter card number: "))
    pin = int(input("set pin: "))
    accounts.append({
        'accountName': accountName,
        'balance': balance,
        'status': "active",
        'cardNumber': cardNumber,
        'pin': pin
    })
    print("\nAccount added successfully!")


def change_pin():
    cardNumber = int(input("Enter card number: "))
    balance = float(input("Enter balance: "))
    for account in accounts:
        if account['cardNumber'] == cardNumber and account['balance'] == balance:
            pin = int(input("Enter new pin: "))
            account['pin'] = pin
            print("\nPin changed successfully!")
            break
    else:
        print("\nCant identify!")


while True:

    option = input(
        "\nChoose an option: \n(1)-Deposit. \n(2)-Withdrawal. \n(3)-Balance Check.\n(4)-Change Status. \n(5)- Find Details \n(6)- All Account \n(7)- New Account \n(8)- Change Pin \n(0) Exit: ")
    if option == '1':
        card_number, status = verify_account()
        if card_number is not None:
            card_number, balance, deposit_amount = deposit(card_number)
            if card_number is not None and balance is not None and deposit_amount is not None:
                print("\nCard Number:", card_number)
                print("Deposit Amount:", deposit_amount)
                print("Current Balance:", balance)

    elif option == '2':
        card_number, status = verify_account()

        if status == 'inactive':
            print("\nYour account is inactive, can not withdraw.")

        elif card_number is not None and status is not None:
            card_number, balance, withdrawal_amount = withdraw(card_number)
            if card_number is not None and balance is not None and withdrawal_amount is not None:
                print("\nCard Number:", card_number)
                print("Withdrawal Amount:", withdrawal_amount)
                print("Current Balance:", balance)

    elif option == '3':
        balance = check_balance()
        if balance is not None:
            print("\nCurrent Balance:", balance)

    elif option == '4':
        card_number, status = verify_account()
        if card_number is not None:
            for account in accounts:
                if account['cardNumber'] == card_number:
                    print("\nAccount Status:", account['status'])
                    change_status = input(
                        "Do you want to change the account status? (1-yes / 2-no): ")
                    if change_status == '1':
                        if account['status'] == 'active':
                            account['status'] = 'inactive'
                            print("\nAccount status changed to inactive.")
                        else:
                            account['status'] = 'active'
                            print("\nAccount status changed to active.")
                    elif change_status == '2':
                        print("\nReturning to the main menu.")
                    else:
                        print("\nInvalid input. Returning to the main menu.")
                    break

    elif option == '5':
        cardNumber = int(input("Enter card number: "))
        find_details(cardNumber)

    elif option == '6':
        username = input("Enter your username: ")
        password = input("Enter your password: ")
        for admin_user in admin:  # Changed the loop variable name from 'admin' to 'admin_user'
            if admin_user['username'] == username and admin_user['password'] == password:
                all_account()
            else:
                print("\nInvalid username or password")

    elif option == '7':
        username = input("Enter your username: ")
        password = input("Enter your password: ")
        for admin_user in admin:  # Changed the loop variable name from 'admin' to 'admin_user'
            if admin_user['username'] == username and admin_user['password'] == password:
                add_account()
            else:
                print("\nInvalid username or password")

    elif option == '8':
        change_pin()

    elif option == '0':
        print("\nExiting...")
        break

    else:
        print("\nInvalid option.")

print("\nThank you for using our service!")
