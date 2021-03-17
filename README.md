# Internexus Watcher

PHP monitoring package.

### Install

```
composer require internexus/watcher-php
```

#### Publish config

```
php artisan vendor:publish --provider="Internexus\Watcher\WatcherServiceProvider"
```

#### Middleware

Attach the WebMonitoringMiddleware on `app/Http/Kernel.php`:

```php
/**
 * The application's route middleware groups.
 *
 * @var array
 */
protected $middlewareGroups = [
    'web' => [
        ...,
        \Internexus\Watcher\Middleware\WebRequestMonitoring::class,
    ],

    'api' => [
        ...,
        \Internexus\Watcher\Middleware\WebRequestMonitoring::class,
    ]
```
#### For Lumen

```php
$app->register(\Internexus\Watcher\WatcherServiceProvider::class);
```

### Configure the .env variable

```
WATCHER_TOKEN=[project token]
```

#### Check your environment
```
php artisan watcher:test
```
