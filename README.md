<p><img src="./public/assets/favicon/apple-icon-180x180.png" width="100"></p>

## About e-shop Package 🐣 ([Demo](https://mwspace.com/store))

Let's say I want to turn my simple site made with laravel into a shop.

How many steps should I follow to configure the entire Shop with the modem and controllers from scratch?

I should start writing the classes for the models in the database, the migrations, the keys, populate the database, create a login for admin, migrate the tables, start creating all the calls from the routes to the controllers to insert products, insert categories, insert payments etcetera etcetera.

But if I have already done the website and just want to turn it from Statico to an actual Shop how can I do?

### Requirement
- Laravel >= 6.x
- PostgreSQL >=< 11.3

Simple, launching command as Follow in your Laravel Application: 

    composer require mwspace/e-shop

Here magically my laravel application becomes a powerful ecommerce! Now I just have to load my products and make the site pages dynamic so that they take the products from the database.

For Install & Popolate Database,Users, Admin etc u can run:

    php artisan eshop:install

For Use e-shop future queue (Best Performance & Cron) [must activate Cron Job]

    * * * * * cd /path-to-your-project && php artisan eshop:queue >> /dev/null 2>&1    
    
Preconfigured, you'll be ready to make money with your Fantastic Front End!

<p><img src="./preview.png" width="100%"></p>

For Update e-shop repository u can simply run as follow (!!!Please, backup your app first!!!)

    php artisan eshop:update
    
## Customize Admin Path 👻

For customize admin path for your backend, u simple use env var as follow:

    ESHOP_PREFIX=myawesomeshop
       
## Payment System api (Stripe access express) 🤑

<p><img src="./overview.gif" width="100%"></p>

## Contributing 🐙

Thank you for considering contributing to the e-shop Laravel Package!

## Security Vulnerabilities 🦑

If you discover a security vulnerability within e-shop, please send an e-mail to Support via [e-shop@mwspace.com](mailto:e-shop@mwspace.com). All security vulnerabilities will be promptly addressed.

## License 🦐

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
