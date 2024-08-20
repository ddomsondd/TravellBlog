##General Project Information

This project is a travel blog website based on PHP Laravel. It was created to fulfill the requirements of the course "Web Application Programming."
Tools such as TailwindCSS were used for managing the user interface styles, and Toastr was used for displaying notifications.


##Requirements
- PHP 8.2.4
- Laravel Framework 10.39.0
- XAMPP (MySQL, Apache)
- Node v21.5.0
- Composer 2.6.6


##Installation
1. Place the 'Projekt' folder in 'xampp\htdocs'.
2. In the project folder, open a terminal and run the command: npm install (a 'node_modules' folder should appear).
3. In the project folder, open a terminal and run the command: composer install (a 'vendor' folder should appear).
4. Start XAMPP: MySQL Database and Apache Web Server.
5. Migrate the database: php artisan migrate.
6. When prompted with 'Would you like to create it? (yes/no)', type 'yes'.
7. Load sample data: php artisan db:seed.
8. In the project folder, run the command: npm run dev in the terminal.
9. In the project folder, open a new terminal window and run the command: php artisan serve.
10. The website will be accessible in the browser at: localhost:8000.


##Sample Login Accounts

- admin
        Login: admin@a.a
        Password: Admin123
- Piotr:
        Login: p.piotr@p.pl
        Password: PIOTRpiotr2!!
- Adam:
        Login: adam@a.a
        Password: ADAMadam2!!
- Anastazja:
        Login: a.nastazja@gmail.com
        Password: nastkAAAAA
- Dorota:
        Login: dorka@onet.pl
        Password: DORKAdorka2!!
