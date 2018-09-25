# stripe-php-connect
In this repository I will be showing how to utilize Stripe Connect (Express) to payout people, whether it be for affiliates or independent contractor. **Note I am using OOP PHP, not Procedural!**

## Step One
If you're using xampp, login to **phpmyadmin** or **sequel pro** and upload the `stripe_connect.sql` file.  

## Step Two
Update your config File, which can be found at `classes/Config.php`. You will want to input your **stripe credentials** and **database details** here. 

## Want to know what each file does?
- `Config.php` contains all the constants.
- `DatabaseConnection.php` is the database model.
- `StripeConnect.php` is the controller for all of the critical functions. 
- `View.php` is where all HTML is stored at. 
- `autoload.php` allows you to utilize all classes using this simple statement: `include 'include/autoload.php'`
- `index.php` is your main point of access, as always.

## Questions?
Please open an issue or send me an email: antoinesolomon5@gmail.com
