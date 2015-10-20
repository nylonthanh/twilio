# twilio
SMS service meant to go into a larger project; built out with a factory design so to enable user to plug in a new SMS service less headaches

to run:

0 assumes you have a twilio account already with auth token and account
1 get the repo
2 edit the /App/Config/Config.php file and put in the:

        define('TWILIO_ACCOUNT_ID', '');
        define('TWILIO_AUTH_TOKEN', '');
        define('FROM_PHONE_NUMBER', '');
        define('CORS_DISABLED', FALSE);

3 /index.php is the client, so use this as an example to call the 'create' static method and the sendMessage() method.

4 target/to-phone number is set in index.php

5 from-phone number is from twilio. It will fail if you put a fake one in

todo: logging, tests, if one service fails use another (and log it)
