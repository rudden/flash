Flash Messages for Anax MVC Framework
=========

This module buildt for Anax MVC saves a chosen flash message in the session and outputs it where you want within a div. The buildt in flash message types for now are info, success, error and warning.

By Simon Rudén, ruden.simon@gmail.com

Getting Started!
------------------

If you're using composer you can install the package by adding the following to your composer.json file
```
"require": {
    "rudden/flash": "dev-master"
}
```

.. and if you're not - just clone the repo through the command line

```
git clone https://github.com/rudden/flash.git
```

First Step
------------------

When you've installed the package you'll need to copy a couple of files from the vendors directory. 

Run the following code from your command line:
```
cp -r vendor/rudden/flash/webroot/css/flash.css webroot/css
```

Second Step
------------------

Now you'll need to add the flash service to $di (either within your frontcontroller or within ``config_with_app.php``):

```php
$di->setShared('fmsg', function() use ($di) {
    $fmsg = new rudden\Flash\FlashMessages();
    $fmsg->setDI($di);
    return $fmsg;
});
```

And now you can access the following methods to flash messages to the user:

```php
$app->fmsg->info('Info Message');
```

```php
$app->fmsg->error('Error Message');
```

```php
$app->fmsg->success('Success Message');
```

```php
$app->fmsg->warning('Warning Message');
```

When you run the methods above you store a message in the session. To output it to the user, you run this:

```php
$app->fmsg->print();
```


License
------------------

This software is free software and carries a MIT license.


```
 .  
..:  Copyright (c) 2015 - 2015 Simon Rudén - ruden.simon@gmail.com
```
