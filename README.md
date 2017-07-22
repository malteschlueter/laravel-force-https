mschlueter/laravel-force-https
================

## Installation

Run in terminal:
`composer require mschlueter/laravel-force-https:master-dev`


### Laravel 5.* Integration

Add the middleware to a controller, group, etc:

```php
\Mschlueter\Routing\Middleware\ForceHttps,
```

#### Addtional information ####

If the environment is not in production, the middleware will be skipped. 
